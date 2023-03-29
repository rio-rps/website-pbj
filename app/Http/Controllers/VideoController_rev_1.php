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
                'link_video' => 'required|url',
            ], [
                'link_video.required' => 'Link Tidak Boleh Kosong',
                'link_video.url' => 'Format URL salah',
            ]);


            $post = VideoModel::create([
                'link_video'   => $r->link_video,
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
                'result' => VideoModel::all()
            ];
            return view('private.video.data', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function edit(VideoModel $videoModel)
    {
        //
    }


    public function update(Request $request, VideoModel $videoModel)
    {
        //
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
