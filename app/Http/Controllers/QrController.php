<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function viewQrCode()
    {
        $id = 'KITA_BERSAUDARA';
        $qrCode = $this->makeQrCode($id);
        return view('qr-test', ['qrCode' => $qrCode]);
    }

    private function makeQrCode($id)
    {
        $qrCode = QrCode::format('svg')
            ->size(300)
            ->margin(2)
            ->generate($id);

        return $qrCode;
    }
}
