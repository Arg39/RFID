<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Scans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ScansController extends Controller
{
    public function store(Request $request)
    {
        try {
            $now = Carbon::now();

            $now = Carbon::now('Asia/Makassar'); // WITA

            $batasWaktu = Carbon::today('Asia/Makassar')->setTime(0, 0, 0);

            $status = $now->lessThanOrEqualTo($batasWaktu)
                ? 'tepat_waktu'
                : 'terlambat';

            $scan = Scans::create([
                'uid' => $request->uid,
                'nama' => $request->nama,
                'nisn' => $request->nisn,
                'status' => $status
            ]);

            $scanData = $scan->only(['uid', 'nama', 'nisn', 'status']);

            return response()->json(
                new PostResource(true, 'Scan berhasil', $scanData),
                201
            );

        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return response()->json(
                    new PostResource(false, 'Scan gagal: UID sudah terdaftar', null),
                    409
                );
            }
            return response()->json(
                new PostResource(false, 'Scan gagal: ' . $e->getMessage(), null),
                500
            );

        } catch (\Exception $e) {
            return response()->json(
                new PostResource(false, 'Scan gagal: ' . $e->getMessage(), null),
                500
            );
        }
    }
}
