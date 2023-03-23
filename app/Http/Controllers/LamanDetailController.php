<?php

namespace App\Http\Controllers;

use App\Models\LamanDetailModel;
use App\Models\LamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Brian2694\Toastr\Facades\Toastr;

class LamanDetailController extends Controller
{

    public function show($id)
    {
        $row = LamanModel::where('slug_laman', $id)->first();
        $data = [
            'title' => 'DETAIL LAMAN ' . $row->nm_laman,
            'row' => $row,
        ];
        return view('private/laman_detail/view')->with($data);
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
}
