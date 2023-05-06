<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\PostKategoriRelationshipsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Illuminate\Support\Str;

class KategoriController extends Controller
{

    public function createSlug($title, $id_kategori = null)
    {
        $slug = Str::slug($title);

        // Cek apakah post yang diedit memiliki slug yang sama dengan post lain di database
        $query = KategoriModel::where('slug_kategori', $slug);
        if ($id_kategori) {
            $query->where('id_kategori', '<>', $id_kategori);
        }
        $count = $query->count();

        return ($count > 0) ? "{$slug}-{$count}" : $slug;
    }

    public function index()
    {
        $data = [
            'title' => 'KATEGORI POST',
        ];
        return view('private/kategori/view')->with($data);
    }

    public function create()
    {
        if (request()->ajax()) {
            $data = [
                'title_form' => 'FORM INPUT DATA BARU',
            ];
            return view('private.kategori.formadd', $data);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }


    public function store(Request $r)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'nm_kategori' => 'required|unique:cpar_kategori,nm_kategori',
                'ket_kategori' => 'required',
            ], [
                'nm_kategori.required' => 'Nama Kategori Tidak Boleh Kosong',
                'nm_kategori.unique' => 'Nama Kategori Sudah Ada',
                'ket_kategori.required' => 'Nama Keterangan Kategori Tidak Boleh Kosong',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = KategoriModel::create([
                    'nm_kategori'  => $r->nm_kategori,
                    'slug_kategori' => $this->createSlug($r->nm_kategori),
                    'ket_kategori' => $r->ket_kategori,
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
            return  DataTablesDataTables::of(KategoriModel::query())
                ->addColumn('action', 'private.kategori.action')
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $row = KategoriModel::where('id_kategori', $id)->first();
            $data = [
                'id'  => $id,
                'row' => $row,
                'title_form' => 'FORM EDIT DATA',
            ];
            return view('private.kategori.formedit', $data);
        } else {
            exit('Maaf, request tidak dapat diproses');
        }
    }

    public function update(Request $r, $id)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'nm_kategori' => 'required',
                'ket_kategori' => 'required',
            ], [
                'nm_kategori.required' => 'Nama Kategori Tidak Boleh Kosong',
                'ket_kategori.required' => 'Nama Keterangan Kategori Tidak Boleh Kosong',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $post = KategoriModel::where('id_kategori', $id)->update([
                    'nm_kategori'  => $r->nm_kategori,
                    //'slug_kategori'  => $this->createSlug($r->nm_kategori, $id),
                    'ket_kategori' => $r->ket_kategori,
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
            $cek = PostKategoriRelationshipsModel::where('id_kategori', $id)->count();
            if ($cek > 0) {
                return response()->json(['error' => 'Tidak Dapat di Hapus, Sudah digunakan/ Hubungi Admin']);
            } else {
                KategoriModel::where('id_kategori', $id)->delete();
                return response()->json([
                    'success' => 'Data berhasil dihapus',
                ]);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
