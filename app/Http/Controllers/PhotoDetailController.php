<?php

namespace App\Http\Controllers;

use App\Models\PhotoDetailModel;
use App\Models\PhotoModel;
use Illuminate\Http\Request;

class PhotoDetailController extends Controller
{

    public function index(Request $r)
    {
        $p = PhotoModel::where('slug_galeri_photo', $r->p)->first();
        // $row = $p->id_galeri_photo;
        // $result = PhotoDetailModel::where('id_galeri_photo', $row->id_galeri_photo)->get();
        $data = [
            'title' => 'GALERI PHOTO ' . $p->nm_galeri_photo,
            'id_galeri_photo' => $p->id_galeri_photo,
        ];
        return view('private/photo_detail/view')->with($data);
    }

    public function create(Request $r)
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
                'id_galeri_photo' => $r->kode
            ];
            return view('private.photo_detail.formadd', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function store(Request $r)
    {
        if (request()->ajax()) {
            //dd($r->gambar_slide);
            $r->validate([
                'gambar_galeri_photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ], [
                'gambar_galeri_photo.required' => 'Photo Tidak Boleh Kosong',
                'gambar_galeri_photo.mimes' => 'Photo Hanya di perbolehkan ekstensi JPEG, JPG, PNG',
            ]);

            $gambar_name = "";
            if ($image = $r->file('gambar_galeri_photo')) {
                $gambar_path = public_path('images/galeri_photo');
                $gambar_ekstensi = $image->getClientOriginalExtension();
                $gambar_name = date('ymdhis') . "." . $gambar_ekstensi;
                $image->move($gambar_path, $gambar_name);
            }

            $post = PhotoDetailModel::create([
                'gambar_galeri_photo'   => $gambar_name,
                'id_galeri_photo' => $r->id_galeri_photo,
            ]);
            if ($post = true) {
                return response()->json([
                    'success' => 'Data berhasil disimpan',
                    'myReload' => 'slideShowData'
                ]);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function show($id)
    {
        if (request()->ajax()) {
            $data = [
                'result' => PhotoDetailModel::where('id_galeri_photo', $id)->get()
            ];
            return view('private.photo_detail.data', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function edit(PhotoDetailController $PhotoDetailController)
    {
        //
    }


    public function update(Request $request, PhotoDetailController $PhotoDetailController)
    {
        //
    }

    public function destroy(Request $r, $id)
    {
        if (request()->ajax()) {
            $row = PhotoDetailModel::where('id_galeri_photo_detail', $id)->first();
            $imagePath = public_path('images/galeri_photo') . '/' . $row->gambar_galeri_photo;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            PhotoDetailModel::where('id_galeri_photo_detail', $id)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
                'myReload' => $r->myReload,
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
