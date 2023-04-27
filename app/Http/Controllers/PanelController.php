<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PanelController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            //return view('layout.main');
            $data = [
                'allPost' => PostModel::withCount('JPostHistoriCount')->orderBy('j_post_histori_count_count', 'desc')->get(),
                'allKategori' => KategoriModel::all()
            ];
            return view('private.layout.beranda', $data);
        } else {
            return redirect('/panel');
        }
    }
}
