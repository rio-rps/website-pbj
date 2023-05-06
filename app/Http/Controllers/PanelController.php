<?php

namespace App\Http\Controllers;

use App\Models\DataKritikSaranModel;
use App\Models\HistoriCountPostModel;
use App\Models\HistoriLoginModel;
use App\Models\HistoriPengunjungWebsiteModel;
use App\Models\KategoriModel;
use App\Models\PengaduanModel;
use App\Models\PostModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PanelController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            //return view('layout.main');
            $today = Carbon::today();
            $monthNow = Carbon::now()->format('m');
            $data = [
                'allPost' => PostModel::withCount('JPostHistoriCount')->orderBy('j_post_histori_count_count', 'desc')->get(),
                //'allKategori' => KategoriModel::all(),
                'read_post_today' => HistoriCountPostModel::whereDate('created_at', $today)->count(),
                'visitor_today' => HistoriPengunjungWebsiteModel::whereDate('created_at', $today)->count(),
                'count_login' => HistoriLoginModel::where('id_user', '!=', '1')->whereDate('created_at', $today)->count(),


                'pengaduan_all' => PengaduanModel::where('validasi_pengaduan', '!=', '3')->count(),
                'pengaduan_month' => PengaduanModel::where('validasi_pengaduan', '!=', '3')->whereMonth('tgl_kirim', $monthNow)->count(),
                'pengaduan_today' => PengaduanModel::where('validasi_pengaduan', '!=', '3')->whereDate('tgl_kirim', $today)->count(),

                'kritikSaran_all' => DataKritikSaranModel::where('validasi_kritik_saran', '!=', '3')->count(),
                'kritikSaran_month' => DataKritikSaranModel::where('validasi_kritik_saran', '!=', '3')->whereMonth('tgl_kirim', $monthNow)->count(),
                'kritikSaran_today' => DataKritikSaranModel::where('validasi_kritik_saran', '!=', '3')->whereDate('tgl_kirim', $today)->count()

            ];
            return view('private.layout.beranda', $data);
        } else {
            return redirect('/panel');
        }
    }
}
