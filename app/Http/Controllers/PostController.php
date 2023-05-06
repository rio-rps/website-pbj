<?php

namespace App\Http\Controllers;

use App\Models\HistoriCountPostModel;
use App\Models\KategoriModel;
use App\Models\PostKategoriRelationshipsModel;
use App\Models\PostModel;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function createSlug($title, $post_kd = null)
    {
        $slug = Str::slug($title);

        // Cek apakah post yang diedit memiliki slug yang sama dengan post lain di database
        $query = PostModel::where('slug_title', $slug);
        if ($post_kd) {
            $query->where('post_kd', '<>', $post_kd);
        }
        $count = $query->count();

        return ($count > 0) ? "{$slug}-{$count}" : $slug;
    }


    public function index()
    {
        $data = [
            'title' => 'POST',
        ];
        return view('private/post/view')->with($data);
    }

    public function create()
    {
        $data = [
            'title' => 'FORM INPUT DATA BARU',
            'resultKategori' => KategoriModel::all()
        ];
        return view('private.post.formadd', $data);
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images/post'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/post/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function store(Request $r)
    {

        $validator = Validator::make($r->all(), [
            'post_title' => 'required',
            'post_thumbnail' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'tgl_terbit' => 'required',
            'post_content' => 'required',
            'post_status' => 'required',
            'id_kategori' => 'required',
        ], [
            'post_title.required' => 'Judul Tidak Boleh Kosong',
            'post_thumbnail.required' => 'Thumbnail Tidak Boleh Kosong',
            'post_thumbnail.mimes' => 'Thumbnail Hanya di perbolehkan ekstensi JPEG, JPG, PNG',
            'tgl_terbit.required' => 'Tanggal Terbit Tidak Boleh Kosong',
            'post_content.required' => 'Isi Tidak Boleh Kosong',
            'post_status.required' => 'Status Tidak Boleh Kosong',
            'id_kategori.required' => 'kategori Tidak Boleh Kosong',
        ]);





        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 422);
        } else {

            $date = DateTime::createFromFormat('d-m-Y H:i', $r->tgl_terbit);
            $tgl_terbit =  $date->format('Y-m-d H:i:s');


            $gambar_name = "";
            if ($image = $r->file('post_thumbnail')) {
                $gambar_path = public_path('images/thumbnail');
                $gambar_ekstensi = $image->getClientOriginalExtension();
                $gambar_name = date('ymdhis') . "." . $gambar_ekstensi;
                $image->move($gambar_path, $gambar_name);
            }

            PostModel::create([
                'post_title'  => $r->post_title,
                'slug_title'  =>  $this->createSlug($r->post_title),
                'post_thumbnail' => $gambar_name,
                'post_content' => $r->post_content,
                'post_status' => $r->post_status,
                'tgl_terbit' => $tgl_terbit,
            ]);


            $id = DB::getPdo()->lastInsertId();

            $kat = $r->input('id_kategori');
            $jml_kat = count($kat);
            for ($i = 0; $i < $jml_kat; $i++) {
                $post =  PostKategoriRelationshipsModel::create([
                    'id_kategori'  => $r->id_kategori[$i],
                    'post_kd'  => $id,
                ]);
            }

            $row = PostModel::where('post_kd', $id)->first();
            return response()->json(['success' => 'Data berhasil disimpan', 'myReload' => 'href', 'route' => route('post.edit', $row->slug_title)]);
        }
    }


    public function show()
    {
        if (request()->ajax()) {
            return  DataTablesDataTables::of(PostModel::query()->orderby('tgl_terbit', 'DESC'))
                ->addColumn('action', 'private.post.action')
                ->addColumn('kategori', function ($row) {
                    $result = PostKategoriRelationshipsModel::where('post_kd', $row->post_kd)->get();
                    $isi = '';
                    foreach ($result as $dt) {
                        $isi .= "<span class='badge badge-secondary'>" . $dt->JKategori->nm_kategori . "</span> ";
                    }
                    return $isi;
                })
                ->addColumn('status', function ($row) {
                    if ($row->post_status == 1) {
                        $badge = "badge-secondary";
                    } else if ($row->post_status == 2) {
                        $badge = "badge-danger";
                    }
                    return "<span class='badge " . $badge . "'>" . cekStatusPost($row->post_status) . "</span>";
                })
                ->addColumn('tanggal', function ($row) {
                    return cek_date_ddmmyyyy_his_v1($row->tgl_terbit);
                })
                ->rawColumns(['kategori', 'action', 'status'])
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function edit($id)
    {

        $row = PostModel::where('slug_title', $id)->first();

        $data = [
            'title' => 'FORM EDIT DATA',
            'resultKategori' => KategoriModel::all(),
            'tgl_terbit' => date("d-m-Y H:i", strtotime($row->tgl_terbit)),
            'dtKategori' => PostKategoriRelationshipsModel::where('post_kd', $row->post_kd)->get(),
            'id' => $row->post_kd,
            'row' => $row
        ];
        return view('private.post.formedit', $data);
    }

    public function updatedata(Request $r, $id)
    {
        dd($r);
    }

    public function update(Request $r, $id)
    {
        $validator = Validator::make($r->all(), [
            'post_title' => 'required',
            'post_thumbnail' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'tgl_terbit' => 'required',
            'post_content' => 'required',
            'post_status' => 'required',
            'id_kategori' => 'required',
        ], [
            'post_title.required' => 'Judul Tidak Boleh Kosong',
            'post_thumbnail.nullable' => 'Thumbnail Tidak Boleh Kosong',
            'post_thumbnail.mimes' => 'Thumbnail Hanya di perbolehkan ekstensi JPEG, JPG, PNG',
            'tgl_terbit.required' => 'Tanggal Terbit Tidak Boleh Kosong',
            'post_content.required' => 'Isi Tidak Boleh Kosong',
            'post_status.required' => 'Status Tidak Boleh Kosong',
            'id_kategori.required' => 'kategori Tidak Boleh Kosong',
        ]);


        $rowPost = PostModel::where('post_kd', $id)->first();

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 422);
        } else {

            $date = DateTime::createFromFormat('d-m-Y H:i', $r->tgl_terbit);
            $tgl_terbit =  $date->format('Y-m-d H:i:s');




            if ($r->hasFile('post_thumbnail')) {
                // code untuk upload file gambar baru

                $gambar_name = "";
                $image = $r->file('post_thumbnail');
                $gambar_path = public_path('images/thumbnail');
                $gambar_ekstensi = $image->getClientOriginalExtension();
                $gambar_name = date('ymdhis') . "." . $gambar_ekstensi;
                $image->move($gambar_path, $gambar_name);

                $old_thumbnail = $rowPost->post_thumbnail;

                if ($old_thumbnail) {
                    $old_thumbnail_path = public_path('images/thumbnail/' . $old_thumbnail);
                    if (file_exists($old_thumbnail_path)) {
                        unlink($old_thumbnail_path);
                    }
                }
            } else {
                // code untuk mempertahankan file gambar lama
                $gambar_name =  $rowPost->post_thumbnail;
            }



            PostModel::where('post_kd', $id)->update([
                'post_title'  => $r->post_title,
                'post_thumbnail' => $gambar_name,
                'post_content' => $r->post_content,
                'post_status' => $r->post_status,
                //'slug_title' =>  $this->createSlug($r->post_title, $id),

                'tgl_terbit' => $tgl_terbit,
            ]);





            //-------------
            // kode lama
            // PostKategoriRelationshipsModel::where('post_kd', $id)->delete();
            // $kat = $r->input('id_kategori');
            // $jml_kat = count($kat);
            // for ($i = 0; $i < $jml_kat; $i++) {
            //     $post =  PostKategoriRelationshipsModel::create([
            //         'id_kategori'  => $r->id_kategori[$i],
            //         'post_kd'  => $id,
            //     ]);
            // }
            //-------------------

            //-------------------
            // kode baru
            // $kat = $r->input('id_kategori');
            // Mengambil semua id_kategori yang terkait dengan post
            $existingCategories = PostKategoriRelationshipsModel::where('post_kd', $id)->pluck('id_kategori')->toArray();

            // Mengambil semua id_kategori pada request
            $newCategories = $r->input('id_kategori');

            // Membandingkan dan hapus data yang tidak diperlukan
            $deletedCategories = array_diff($existingCategories, $newCategories);
            if (!empty($deletedCategories)) {
                PostKategoriRelationshipsModel::where('post_kd', $id)
                    ->whereIn('id_kategori', $deletedCategories)
                    ->delete();
            }

            // Menambahkan data baru
            $jml_kat = count($newCategories);
            for ($i = 0; $i < $jml_kat; $i++) {
                $post =  PostKategoriRelationshipsModel::updateOrCreate(
                    [
                        'id_kategori'  => $newCategories[$i],
                        'post_kd'  => $id,
                    ],
                    []
                );
            }
            // end
            //--------------------



            $row = PostModel::where('post_kd', $id)->first();

            return response()->json([
                'success' => 'Data berhasil diupdate',
                //'myReload' => 'href',
                // 'route' => route('post.edit', $row->slug_title)
            ]);

            // return redirect()->route('post.edit', $row->slug_title)->with([
            //     'status' => 'Berhasil',
            //     'message' => 'Data berhasil diupdate',
            //     'icon' => 'success',
            // ]);
        }
    }

    public function editStatus($id)
    {

        if (request()->ajax()) {
            $row = PostModel::where('post_kd', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
                'title_form' => 'FORM EDIT DATA',
            ];
            return view('private.post.formeditstatus', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }

    public function updateStatus(Request $r, $id)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'post_status' => 'required',
            ], [
                'post_status.required' => 'Status Tidak Boleh Kosong',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = PostModel::where('post_kd', $id)->update([
                    'post_status'  => $r->post_status,
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
            $row = PostModel::where('post_kd', $id)->first();
            PostModel::where('post_kd', $id)->delete();

            $old_thumbnail_path = public_path('images/thumbnail/' . $row->post_thumbnail);
            if (file_exists($old_thumbnail_path)) {
                unlink($old_thumbnail_path);
            }

            PostKategoriRelationshipsModel::where('post_kd', $id)->delete();
            HistoriCountPostModel::where('post_kd', $id)->delete();

            return response()->json([
                'success' => 'Data berhasil dihapus',
            ]);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
