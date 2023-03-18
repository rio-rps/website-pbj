<?php

namespace App\Http\Controllers;

use App\Models\SlideShowModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SlideShowController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'SLIDE SHOW',
        ];
        return view('private/slide_show/view')->with($data);
    }


    public function create()
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
            ];
            return view('private.slide_show.formadd', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function store(Request $r)
    {
        if (request()->ajax()) {
            //dd($r->gambar_slide);
            $r->validate([
                'gambar_slide' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ], [
                'gambar_slide.required' => 'Gambar Slide Tidak Boleh Kosong',
                'gambar_slide.mimes' => 'Gambar Hanya di perbolehkan ekstensi JPEG, JPG, PNG',
            ]);

            $gambar_name = "";
            if ($image = $r->file('gambar_slide')) {
                $gambar_path = public_path('images/gambar_slide');
                $gambar_ekstensi = $image->getClientOriginalExtension();
                $gambar_name = date('ymdhis') . "." . $gambar_ekstensi;
                $image->move($gambar_path, $gambar_name);
            }

            $post = SlideShowModel::create([
                'gambar_slide'   => $gambar_name,
                'status_actived' => 1,
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


    public function show()
    {
        if (request()->ajax()) {
            $data = [
                'result' => SlideShowModel::all()
            ];
            return view('private.slide_show.data', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $row = SlideShowModel::where('id_slide', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
                'title_form' => 'FORM EDIT DATA',
            ];
            return view('private.slide_show.formedit', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }


    public function update(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'status_actived' => 'required',
        ], [
            'status_actived.required' => 'Status Tampil Slide Show Tidak Boleh Kosong',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 422);
        } else {
            SlideShowModel::where('id_slide', $id)->update([
                'status_actived' => $r->status_actived,
            ]);
            return response()->json([
                'success' => 'Data berhasil diupdate',
                'myReload' => 'slideShowData',
            ]);
        }
    }

    public function destroy(Request $r, $id)
    {
        if (request()->ajax()) {
            //echo $r->myTable;

            $row = SlideShowModel::where('id_slide', $id)->first();
            $imagePath = public_path('images/gambar_slide') . '/' . $row->gambar_slide;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            SlideShowModel::where('id_slide', $id)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
                'myReload' => $r->myReload,
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
