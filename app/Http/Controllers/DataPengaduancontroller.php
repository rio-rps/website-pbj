<?php

namespace App\Http\Controllers;

use App\Models\PengaduanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class DataPengaduancontroller extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'DATA PENGADUAN',
        ];
        return view('private/pengaduan/view')->with($data);
    }

    public function show()
    {
        if (request()->ajax()) {
            return  DataTablesDataTables::of(PengaduanModel::where('validasi_pengaduan', '1')->orderBy('tgl_kirim', 'DESC'))
                ->addColumn('action', 'private.pengaduan.action')
                ->addColumn('tgl_kirim', function ($row) {
                    return cek_date_ddmmyyyy_his_v1($row->tgl_kirim);
                })
                ->addColumn('katPengaduan', function ($row) {
                    return $row->JKategoriPengaduan->nm_kategori_pengaduan;
                })
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function detail($id)
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'INFORMASI PENGADUAN',
                'row' => PengaduanModel::where('id_pengaduan', $id)->first()
            ];
            return view('private.pengaduan.detail', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function destroy($id)
    {
        if (request()->ajax()) {
            PengaduanModel::where('id_pengaduan', $id)->update([
                'validasi_pengaduan' => '3'
            ]);
            return response()->json([
                'success' => 'Data berhasil dihapus',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
