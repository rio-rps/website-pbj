<?php

namespace App\Http\Controllers;

use App\Models\DataKritikSaranModel;
use App\Models\PengaduanModel;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\PDF;
use PDF;

class LaporanController extends Controller
{
    public function cetakPengaduanDetail($id)
    {
        set_time_limit(3000);

        $data = [
            'row' => PengaduanModel::where('id_pengaduan', $id)->first(),
        ];
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'enable_remote' => true,
            'defaultFont' => 'sans-serif',
            'chroot' => [public_path('images/logo'), public_path('images/pengaduan')],
        ])->loadview('private.laporan.pengaduan_detail', $data)->setpaper('folio', 'potrait');

        return $pdf->stream('pengaduan.pdf');
    }

    public function cetakKritikSaran($id)
    {
        set_time_limit(3000);

        $data = [
            'row' => DataKritikSaranModel::where('id_kritik_saran', $id)->first(),
        ];
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'enable_remote' => true,
            'defaultFont' => 'sans-serif',
            'chroot' => [public_path('images/logo'), public_path('images/pengaduan')],
        ])->loadview('private.laporan.kritik_saran', $data)->setpaper('folio', 'potrait');

        return $pdf->stream('kritik_saran.pdf');
    }
}
