<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\PhotoDetailModel;
use App\Models\PhotoModel;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Illuminate\Support\Str;



class PhotoController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'GALERI PHOTO',
        ];
        return view('private/photo/view')->with($data);
    }

    public function createSlug($title)
    {
        $slug = Str::slug($title);
        $count = PhotoModel::whereRaw("slug_galeri_photo RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return ($count > 0) ? "{$slug}-{$count}" : $slug;
    }

    public function create()
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
            ];
            return view('private.photo.formadd', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function store(Request $r)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'nm_galeri_photo' => 'required|unique:ddd_galeri_photo,nm_galeri_photo',
                'tgl_galeri_photo' => 'required',
            ], [
                'nm_galeri_photo.required' => 'Nama Galeri Tidak Boleh Kosong',
                'nm_galeri_photo.unique' => 'Nama Galeri Sudah Ada',
                'tgl_galeri_photo.required' => 'Tanggal Tidak Boleh Kosong',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = PhotoModel::create([
                    'nm_galeri_photo'  => $r->nm_galeri_photo,
                    'slug_galeri_photo'  => $this->createSlug($r->nm_galeri_photo),
                    'tgl_galeri_photo' => $r->tgl_galeri_photo,
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
            return  DataTablesDataTables::of(PhotoModel::query()->orderby('tgl_galeri_photo', 'ASC'))
                ->addColumn('action', 'private.photo.action')
                ->addColumn('tgl', function ($row) {
                    return cek_ddmmyy_v2($row->tgl_galeri_photo);
                })
                ->addColumn('jumlah_photo', function ($row) {
                    $jmx = PhotoDetailModel::where('id_galeri_photo', $row->id_galeri_photo)->get();
                    return count($jmx) . " Photo";
                })
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $row = PhotoModel::where('id_galeri_photo', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
                'title_form' => 'FORM EDIT DATA',
            ];
            return view('private.photo.formedit', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }

    public function update(Request $r, $id)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'nm_galeri_photo' => 'required',
                'tgl_galeri_photo' => 'required',
            ], [
                'nm_galeri_photo.required' => 'Nama Galeri Tidak Boleh Kosong',
                'tgl_galeri_photo.required' => 'Tanggal Tidak Boleh Kosong',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = PhotoModel::where('id_galeri_photo', $id)->update([
                    'nm_galeri_photo'  => $r->nm_galeri_photo,
                    'slug_galeri_photo'  => $this->createSlug($r->nm_galeri_photo),
                    'tgl_galeri_photo' => $r->tgl_galeri_photo,
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
            $cek = PhotoDetailModel::where('id_galeri_photo', $id)->get();
            if (count($cek) > 0) {
                return response()->json(['error' => 'Tidak Dapat di Hapus, Ada Data Photo  / Hubungi Admin']);
            } else {
                PhotoModel::where('id_galeri_photo', $id)->delete();
                return response()->json([
                    'success' => 'Data berhasil dihapus',
                ]);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
