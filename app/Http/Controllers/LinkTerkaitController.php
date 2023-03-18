<?php

namespace App\Http\Controllers;

use App\Models\LinkTerkaitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

class LinkTerkaitController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'LINK SITUS TERKAIT',
        ];
        return view('private/link_terkait/view')->with($data);
    }


    public function create()
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
            ];
            return view('private.link_terkait.formadd', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function store(Request $r)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'nm_situs' => 'required|unique:cpar_link_terkait,nm_situs',
                'link_situs' => 'required|url',
            ], [
                'nm_situs.required' => 'Nama Situs Tidak Boleh Kosong',
                'nm_situs.unique' => 'Nama Situs Sudah Ada',
                'link_situs.required' => 'Link Situs Tidak Boleh Kosong',
                'link_situs.url' => 'Format URL salah',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = LinkTerkaitModel::create([
                    'nm_situs'   => $r->nm_situs,
                    'link_situs' => $r->link_situs,
                ]);
                return response()->json(['success' => 'Data berhasil disimpan']);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function show()
    {

        if (request()->ajax()) {
            return  DataTablesDataTables::of(LinkTerkaitModel::query())
                ->addColumn('action', 'private.link_terkait.action')
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function edit($id)
    {
        if (request()->ajax()) {
            $row = LinkTerkaitModel::where('id_link', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
                'title_form' => 'FORM EDIT DATA',
            ];
            return view('private.link_terkait.formedit', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }

    public function update(Request $r, $id)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'nm_situs' => 'required',
                'link_situs' => 'required|url',
            ], [
                'nm_situs.required' => 'Nama Situs Tidak Boleh Kosong',
                'link_situs.required' => 'Link Situs Tidak Boleh Kosong',
                'link_situs.url' => 'Format URL salah',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                LinkTerkaitModel::where('id_link', $id)->update([
                    'nm_situs'   => $r->nm_situs,
                    'link_situs' => $r->link_situs,
                ]);
                return response()->json(['success' => 'Data berhasil disimpan']);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function destroy($id)
    {
        if (request()->ajax()) {
            LinkTerkaitModel::where('id_link', $id)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
