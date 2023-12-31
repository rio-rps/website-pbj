<?php

namespace App\Http\Controllers;

use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class VideoController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'VIDEO',
        ];
        return view('private/video/view')->with($data);
    }


    public function create()
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
            ];
            return view('private.video.formadd', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function store(Request $r)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'judul_video' => 'required',
                'link_video' => 'required|url',
            ], [
                'judul_video.required' => 'Judul Video Tidak Boleh Kosong',
                'link_video.required' => 'Link Tidak Boleh Kosong',
                'link_video.url' => 'Format URL salah',
            ]);


            $post = VideoModel::create([
                'judul_video'   => $r->judul_video,
                'link_video'   => $r->link_video,
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
            return  DataTablesDataTables::of(VideoModel::query())
                ->addColumn('action', 'private.video.action')
                ->addColumn('updated_at', function ($row) {
                    return cek_date_ddmmyyyy_his_v1($row->updated_at);
                })
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $row = VideoModel::where('id_galeri_video', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
                'title_form' => 'FORM EDIT DATA',
            ];
            return view('private.video.formedit', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }

    public function update(Request $r, $id)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'judul_video' => 'required',
                'link_video' => 'required|url',
            ], [
                'judul_video.required' => 'Judul Video Tidak Boleh Kosong',
                'link_video.required' => 'Link Tidak Boleh Kosong',
                'link_video.url' => 'Format URL salah',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = VideoModel::where('id_galeri_video', $id)->update([
                    'judul_video'  => $r->judul_video,
                    'link_video' => $r->link_video,
                ]);
                return response()->json(['success' => 'Data berhasil disimpan']);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function destroy(Request $r, $id)
    {
        if (request()->ajax()) {
            VideoModel::where('id_galeri_video', $id)->delete();
            return response()->json([
                'success' => 'Data berhasil dihapus',
                'myReload' => $r->myReload,
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
