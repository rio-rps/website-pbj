<?php

namespace App\Http\Controllers;

use App\Models\LamanDetailModel;
use App\Models\LamanModel;
use App\Models\UploadDokumenLamanModel;
use App\Models\UploadGambarLamanModel;
use App\Models\UploadGambarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables as DataTables;

class LamanDetailController extends Controller
{

    public function show($id)
    {
        $row = LamanModel::where('slug_laman', $id)->first();

        $data = [
            'title' => 'DETAIL LAMAN ' . $row->nm_laman . ' ' . cekJenisLaman($row->jenis_laman) . '',
            'row' => $row,
            'id_laman' => $row->id_laman
        ];
        $cek = LamanModel::where('id_laman', $row->id_laman)->first();
        if ($row->jenis_laman == 1) {
            return view('private.laman_detail.view', $data);
        } elseif ($row->jenis_laman == 2) {
            return view('private.laman_detail.getUploadDokumen_View')->with($data);
        } elseif ($row->jenis_laman == 3) {
            return view('private.laman_detail.getUploadGambar_View', $data);
        } elseif ($row->jenis_laman == 4) {

            if ($cek->id_laman == '52') {
                return  redirect()->to('datapengaduan');
            } else  if ($cek->id_laman == '54') {
                return  redirect()->to('datakritiksaran');
            }
        } elseif ($row->jenis_laman == 5) {
            if ($cek->id_laman == '64') {
                return  redirect()->to('photo');
            } else  if ($cek->id_laman == '65') {
                return  redirect()->to('video');
            }
        }
    }

    public function edit($id)
    {
        $row = LamanModel::where('slug_laman', $id)->first();
        $data = [
            'title' => 'DETAIL LAMAN ' . $row->nm_laman,
            'id'  => $row->id_laman,
            'row' => $row,
            'title_form' => 'FORM EDIT DATA',
        ];

        return view('private.laman_detail.formedit', $data);
    }

    public function update(Request $r, $id)
    {
        $slug = $r->slug;
        $validator = Validator::make($r->all(), [
            'isi_laman' => 'required',
        ], [
            'isi_laman.required' => 'Isi Tidak Boleh Kosong',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 422);
        } else {
            $post = LamanModel::where('id_laman', $id)->update([
                'isi_laman'  => $r->isi_laman,
            ]);
            return redirect()->route('lamandetail.show', $slug)->with([
                'status' => 'Berhasil',
                'message' => 'Data berhasil diupdate',
                'icon' => 'success',
            ]);
        }
    }


    // UPLOAD GAMBAR
    public function getUploadGambar_ViewFormAddModal($id)
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
                'id_laman' => $id
            ];
            return view('private.laman_detail.getUploadGambar_ViewFormAddModal', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function storeUploadGambar(Request $r)
    {
        if (request()->ajax()) {
            $r->validate([
                'nm_gambar' => 'required',
                'file_gambar' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ], [
                'nm_gambar.required' => 'Nama Gambar Tidak Boleh Kosong',
                'file_gambar.required' => 'Gambar Tidak Boleh Kosong',
                'file_gambar.mimes' => 'Gambar Hanya di perbolehkan ekstensi JPEG, JPG, PNG',
            ]);

            $gambar_name = "";
            if ($image = $r->file('file_gambar')) {
                $gambar_path = public_path('upload-data/gambar_laman');
                $gambar_ekstensi = $image->getClientOriginalExtension();
                $gambar_name = date('ymdhis') . "." . $gambar_ekstensi;
                $image->move($gambar_path, $gambar_name);
            }

            $post = UploadGambarLamanModel::create([
                'file_gambar'   => $gambar_name,
                'id_laman' => $r->id_laman,
                'nm_gambar' => $r->nm_gambar,
            ]);
            if ($post = true) {
                return response()->json([
                    'success' => 'Data berhasil disimpan',
                    'myReload' => 'lamanGambar'
                ]);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function showUploadGambar($id)
    {
        if (request()->ajax()) {
            $data = [
                'result' => UploadGambarLamanModel::where('id_laman', $id)->orderBy('id_gambar', 'DESC')->get()
            ];
            return view('private.laman_detail.getUploadGambar_show', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function destroyUploadGambar(Request $r)
    {
        if (request()->ajax()) {
            $row = UploadGambarLamanModel::where('id_gambar', $r->id_gambar)->first();
            $imagePath = public_path('upload-data/gambar_laman') . '/' . $row->file_gambar;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            UploadGambarLamanModel::where('id_gambar', $r->id_gambar)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
                'myReload' => $r->myReload,
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
    //------------------------//

    // UPLOAD DOKUMEN
    public function showUploadDokumen($id)
    {
        if (request()->ajax()) {
            return  DataTables::of(UploadDokumenLamanModel::where('id_laman', $id)->orderBy('id_dokumen', 'DESC')->get())
                ->addColumn('action', 'private.laman_detail.getUploadDokumen_Action')
                ->addColumn('tgl', function ($row) {
                    return $row->created_at;
                })
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function createUploadDokumen(Request $r)
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
                'id_laman' => $r->id_laman
            ];
            return view('private.laman_detail.getUploadDokumen_FormAddModal', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function storeUploadDokumen(Request $r)
    {
        if (request()->ajax()) {
            $r->validate([
                'nm_dokumen' => 'required|unique:edd_upload_dokumen_laman,nm_dokumen',
                'ket_dokumen' => 'required',
                'tahun_dokumen' => 'required',
                'file_dokumen' =>  'required|file|mimes:pdf,docx,xlsx,pptx|max:10000'
            ], [
                'nm_dokumen.required' => 'Nama Dokumen Tidak Boleh Kosong',
                'nm_dokumen.unique' => 'Nama Dokumen Sudah Ada',
                'ket_dokumen.required' => 'Ket Dokumen Tidak Boleh Kosong',
                'tahun_dokumen.required' => 'Tahun Dokumen Tidak Boleh Kosong',
                'ket_dokumen.required' => 'Ket Dokumen Tidak Boleh Kosong',
                'file_dokumen.required' => 'File Dokumen Tidak Boleh Kosong',
                'file_dokumen.mimes' => 'File Hanya di perbolehkan ekstensi pdf,docx,xlsx,pptx'
            ]);

            $file_name = "";
            if ($file = $r->file('file_dokumen')) {
                $file_path = public_path('upload-data/dokumen_laman');
                $file_ekstensi = $file->getClientOriginalExtension();
                $file_name = date('ymdhis') . "." . $file_ekstensi;
                $file->move($file_path, $file_name);
            }


            $post = UploadDokumenLamanModel::create([
                'file_dokumen'   => $file_name,
                'nm_dokumen' => $r->nm_dokumen,
                'ket_dokumen' => $r->ket_dokumen,
                'tahun_dokumen' => $r->tahun_dokumen,
                'id_laman' => $r->id_laman,
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

    public function editUploadDokumen($id)
    {
        if (request()->ajax()) {
            $row = UploadDokumenLamanModel::where('id_dokumen', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
                'title_form' => 'FORM EDIT DATA',
            ];
            return view('private.laman_detail.getUploadDokumen_FormEditModal', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }

    public function updateUploadDokumen(Request $r, $id)
    {
        if (request()->ajax()) {
            $dokumen = UploadDokumenLamanModel::findOrFail($id);

            // Validasi input
            $r->validate([
                'nm_dokumen' => 'required|unique:edd_upload_dokumen_laman,nm_dokumen,' . $id . ',id_dokumen',
                'ket_dokumen' => 'required',
                'tahun_dokumen' => 'required',
                'file_dokumen' => 'nullable|file|mimes:pdf,doc,docx,xlsx,pptx|max:10000',
            ], [
                'nm_dokumen.required' => 'Nama Dokumen Tidak Boleh Kosong',
                'nm_dokumen.unique' => 'Nama Dokumen Sudah Ada',
                'ket_dokumen.required' => 'Ket Dokumen Tidak Boleh Kosong',
                'tahun_dokumen.required' => 'Tahun Dokumen Tidak Boleh Kosong',
                'file_dokumen.mimes' => 'File Hanya di perbolehkan ekstensi pdf,doc,docx,xlsx,pptx',
            ]);


            if ($r->hasFile('file_dokumen')) {
                // code untuk upload file gambar baru 
                $file_name = "";
                $file = $r->file('file_dokumen');
                $file_path = public_path('upload-data/dokumen_laman');
                $file_ekstensi = $file->getClientOriginalExtension();
                $file_name = date('ymdhis') . "." . $file_ekstensi;
                $file->move($file_path, $file_name);

                $old_file = $dokumen->file_dokumen;

                if ($old_file) {
                    $old_file_path = public_path('upload-data/dokumen_laman/' . $old_file);
                    if (file_exists($old_file_path)) {
                        unlink($old_file_path);
                    }
                }
            } else {
                // code untuk mempertahankan file gambar lama
                $file_name =  $dokumen->file_dokumen;
            }

            UploadDokumenLamanModel::where('id_dokumen', $id)->update([
                'nm_dokumen'  => $r->nm_dokumen,
                'file_dokumen' => $file_name,
                'ket_dokumen' => $r->ket_dokumen,
                'tahun_dokumen' => $r->tahun_dokumen,
            ]);

            return response()->json([
                'success' => 'Data berhasil disimpan',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function destroyUploadDokumen(Request $r, $id)
    {
        if (request()->ajax()) {
            $row = UploadDokumenLamanModel::find($id);
            $imagePath = public_path('upload-data/dokumen_laman') . '/' . $row->file_dokumen;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            UploadDokumenLamanModel::where('id_dokumen', $id)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
    //end
}
