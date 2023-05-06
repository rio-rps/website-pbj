<?php

namespace App\Http\Controllers;

use App\Models\DataKritikSaranModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTables;

class DataKritikSaranController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'DATA KRITIK DAN SARAN',
        ];
        return view('private/kritik_saran/view')->with($data);
    }

    public function show()
    {
        if (request()->ajax()) {
            return  DataTables::of(DataKritikSaranModel::where('validasi_kritik_saran', '!=', '3')->orderBy('tgl_kirim', 'DESC'))
                ->addColumn('action', 'private.kritik_saran.action')
                ->addColumn('tgl_kirim', function ($row) {
                    return cek_date_ddmmyyyy_his_v1($row->tgl_kirim);
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
                'title_form' => 'INFORMASI KRITIK DAN SARAN',
                'row' => DataKritikSaranModel::where('id_kritik_saran', $id)->first()
            ];
            return view('private.kritik_saran.detail', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function destroy($id)
    {
        if (request()->ajax()) {
            DataKritikSaranModel::where('id_kritik_saran', $id)->update([
                'validasi_kritik_saran' => '3'
            ]);
            return response()->json([
                'success' => 'Data berhasil dihapus',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
