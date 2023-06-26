<?php

namespace App\Http\Controllers;

use App\Models\LinkHeaderModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTables;

class LinkHeaderController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'LINK HEADER',
        ];
        return view('private/link_header/view')->with($data);
    }

    public function create()
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
            ];
            return view('private.link_header.formadd', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function store(Request $r)
    {
        if (request()->ajax()) {
            $r->validate([
                'link_header' => 'required|unique:cpar_link_header,link_header|url',
                'gambar_link' =>  'required|file|mimes:jpg,jpeg,png|max:10000',
            ], [
                'link_header.required' => 'Link Tidak Boleh Kosong',
                'link_header.unique' => 'Link Sudah Ada',
                'link_header.url' => 'Format URL salah',
                'gambar_link.required' => 'Gambar Tidak Boleh Kosong',
                'gambar_link.mimes' => 'File Hanya di perbolehkan ekstensi jpg,jpeg,png',
            ]);

            $file_name = "";
            if ($file = $r->file('gambar_link')) {
                $file_path = public_path('upload-data/link-header');
                $file_ekstensi = $file->getClientOriginalExtension();
                $file_name = date('ymdhis') . "." . $file_ekstensi;
                $file->move($file_path, $file_name);
            }


            $post = LinkHeaderModel::create([
                'gambar_link'   => $file_name,
                'link_header' => $r->link_header,
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
            return  DataTables::of(LinkHeaderModel::query())
                ->addColumn('action', 'private.link_header.action')
                ->addColumn('gambar', function ($row) {
                    return '<img src="' . asset('upload-data/link-header/' . $row->gambar_link) . '" class="img-fluid" style="max-height: 120px;" >';
                })
                ->rawColumns(['action', 'gambar'])
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $row = LinkHeaderModel::where('id_link_header', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
                'title_form' => 'FORM EDIT DATA',
            ];
            return view('private.link_header.formedit', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }


    public function update(Request $r, $id)
    {
        if (request()->ajax()) {
            $dokumen = LinkHeaderModel::findOrFail($id);

            // Validasi input
            $r->validate([
                'link_header' => 'required|url|unique:cpar_link_header,link_header,' . $id . ',id_link_header',
                'gambar_link' => 'nullable|file|mimes:jpg,jpeg,png|max:10000',
            ], [
                'link_header.required' => 'Link Tidak Boleh Kosong',
                'link_header.unique' => 'Link Sudah Ada',
                'link_header.url' => 'Format URL salah',
                'gambar_link.required' => 'Gambar Tidak Boleh Kosong',
                'gambar_link.mimes' => 'File Hanya di perbolehkan ekstensi jpg,jpeg,png',
            ]);


            if ($r->hasFile('gambar_link')) {
                // code untuk upload file gambar baru 
                $file_name = "";
                $file = $r->file('gambar_link');
                $file_path = public_path('upload-data/link-header');
                $file_ekstensi = $file->getClientOriginalExtension();
                $file_name = date('ymdhis') . "." . $file_ekstensi;
                $file->move($file_path, $file_name);

                $old_file = $dokumen->gambar_link;

                if ($old_file) {
                    $old_file_path = public_path('upload-data/link-header/' . $old_file);
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }
            } else {
                // code untuk mempertahankan file gambar lama
                $file_name =  $dokumen->gambar_link;
            }

            LinkHeaderModel::where('id_link_header', $id)->update([
                'link_header'  => $r->link_header,
                'gambar_link' => $file_name,
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
            $row = LinkHeaderModel::find($id);
            $imagePath = public_path('upload-data/link-header') . '/' . $row->gambar_link;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            LinkHeaderModel::where('id_link_header', $id)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
