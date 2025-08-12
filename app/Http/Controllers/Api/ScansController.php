<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\RfidCard;
use App\Models\Scans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ScansController extends Controller
{
    public function scan(Request $request)
    {
        try {
            // 1. Validasi request harus ada 'uid'
            $request->validate([
                'uid' => 'required|string'
            ]);
    
            $uid = $request->uid;
    
            // 2. Cari RfidCard berdasarkan 'uid'
            $rfidCard = RfidCard::where('uid', $uid)->first();
    
            if (!$rfidCard) {
                // Jika tidak ada, buat RfidCard baru dengan status 'unregistered' dan generate rfid_code unik
                $rfid_code = strtoupper(bin2hex(random_bytes(4)));
                $rfidCard = RfidCard::create([
                    'uid' => $uid,
                    'rfid_code' => $rfid_code,
                    'status' => 'unregistered'
                ]);
                return response()->json(
                    new PostResource(true, 'RFID belum terdaftar, kode dibuatkan untuk melakuakan registrasi', ['registerCode' => $rfidCard->rfid_code]),
                    201
                );
            }
    
            // 3. Jika ada, cek apakah sudah terdaftar ke user (registered)
            $user = $rfidCard->user;
            if ($user) {
                // Sudah terdaftar, return data user
                return response()->json(
                    new PostResource(true, 'RFID sudah terdaftar', [
                        'user' => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'nisn' => $user->nisn,
                            'email' => $user->email,
                            'role' => $user->role,
                            'rfid_card_uid' => $user->rfid_card_uid,
                        ]
                    ]),
                    200
                );
            } else {
                // Belum terdaftar, return codenya kembali
                return response()->json(
                    new PostResource(true, 'RFID belum terdaftar', ['registerCode' => $rfidCard->rfid_code]),
                    200
                );
            }
        } catch (QueryException $e) {
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

    public function store(Request $request)
    {
        try {
            $now = Carbon::now();

            $now = Carbon::now('Asia/Makassar'); // WITA

            $batasWaktu = Carbon::today('Asia/Makassar')->setTime(0, 0, 0);

            $status = $now->lessThanOrEqualTo($batasWaktu)
                ? 'tepat_waktu'
                : 'terlambat';

            // $scan = Scans::create([
            //     'uid' => $request->uid,
            //     'nama' => $request->nama,
            //     'nisn' => $request->nisn,
            //     'status' => $status
            // ]);

            $scanData = 'data';

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
