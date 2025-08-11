<?php

namespace App\Http\Controllers;

use App\Models\Scans;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function exportPDF()
    {
        $data = Scans::select('nama', 'nisn', 'created_at')->get();

        $pdf = Pdf::loadView('pdf.data-siswa', [
            'userData' => $data,
            'date' => now()->format('d-m-Y'),
        ]);

        // return $pdf->download('myfile.pdf');

        return $pdf->stream();
    }
}
