<?php

namespace App\Http\Controllers;

use App\Models\DokumenModel;
use App\Models\DokumensModel;
use App\Models\KategoriModel;
use App\Models\PostKategoriRelationshipsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{


    public function index()
    {
        $data = [
            'title' => 'DOKUMEN',
        ];
        return view('private/dokumen/view')->with($data);
    }

    public function create()
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
            ];
            return view('private.dokumen.formadd', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function store(Request $r)
    {
        if (request()->ajax()) {
            $r->validate([
                'nm_dokumen' => 'required|unique:edd_upload_dokumen,nm_dokumen',
                'file_dokumen' =>  'required|file|mimes:pdf,docx,xlsx,pptx|max:10000',
            ], [
                'nm_dokumen.required' => 'Nama Dokumen Tidak Boleh Kosong',
                'nm_dokumen.unique' => 'Nama Dokumen Sudah Ada',
                'file_dokumen.required' => 'File Dokumen Tidak Boleh Kosong',
                'file_dokumen.mimes' => 'File Hanya di perbolehkan ekstensi pdf,docx,xlsx,pptx',
            ]);

            $file_name = "";
            if ($file = $r->file('file_dokumen')) {
                $file_path = public_path('upload-data/dokumen');
                $file_ekstensi = $file->getClientOriginalExtension();
                $file_name = date('ymdhis') . "." . $file_ekstensi;
                $file->move($file_path, $file_name);
            }


            $post = DokumenModel::create([
                'file_dokumen'   => $file_name,
                'nm_dokumen' => $r->nm_dokumen,
            ]);
            if ($post = true) {
                return response()->json([
                    'success' => 'Data berhasil disimpan',
                ]);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function show()
    {
        if (request()->ajax()) {
            return  DataTablesDataTables::of(DokumenModel::query())
                ->addColumn('action', 'private.dokumen.action')
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $row = DokumenModel::where('id_dokumen', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
                'title_form' => 'FORM EDIT DATA',
            ];
            return view('private.dokumen.formedit', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }

    public function update(Request $r, $id)
    {
        if (request()->ajax()) {
            $dokumen = DokumenModel::findOrFail($id);

            // Validasi input
            $r->validate([
                'nm_dokumen' => 'required|unique:edd_upload_dokumen,nm_dokumen,' . $id . ',id_dokumen',
                'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx,xlsx,pptx|max:10000',
            ], [
                'nm_dokumen.required' => 'Nama Dokumen Tidak Boleh Kosong',
                'nm_dokumen.unique' => 'Nama Dokumen Sudah Ada',
                'file_dokumen.mimes' => 'File Hanya di perbolehkan ekstensi pdf,doc,docx,xlsx,pptx',
            ]);


            if ($r->hasFile('file_dokumen')) {
                // code untuk upload file gambar baru 
                $file_name = "";
                $file = $r->file('file_dokumen');
                $file_path = public_path('upload-data/dokumen');
                $file_ekstensi = $file->getClientOriginalExtension();
                $file_name = date('ymdhis') . "." . $file_ekstensi;
                $file->move($file_path, $file_name);

                $old_file = $dokumen->file_dokumen;

                if ($old_file) {
                    $old_file_path = public_path('upload-data/dokumen/' . $old_file);
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }
            } else {
                // code untuk mempertahankan file gambar lama
                $file_name =  $dokumen->file_dokumen;
            }

            DokumenModel::where('id_dokumen', $id)->update([
                'nm_dokumen'  => $r->nm_dokumen,
                'file_dokumen' => $file_name,
            ]);

            return response()->json([
                'success' => 'Data berhasil disimpan',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function destroy(Request $r, $id)
    {
        if (request()->ajax()) {
            $row = DokumenModel::find($id);
            $imagePath = public_path('upload-data/dokumen') . '/' . $row->file_dokumen;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            DokumenModel::where('id_dokumen', $id)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
