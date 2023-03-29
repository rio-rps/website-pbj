<?php

namespace App\Http\Controllers;

use App\Models\HistoriCountModel;
use App\Models\HistoriCountPostModel;
use App\Models\HistoriPostModel;
use App\Models\KategoriModel;
use App\Models\LamanModel;
use App\Models\PhotoDetailModel;
use App\Models\PhotoModel;
use App\Models\PostModel;
use App\Models\SlideShowModel;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hostname;


class LayoutController extends Controller
{
    public function index(Request $request)
    {
        $posts =  PostModel::select(DB::raw('*, YEAR(tgl_terbit) AS year, MONTH(tgl_terbit) AS month, DAY(tgl_terbit) AS day'))
            ->where('post_status', '1')
            ->withCount('JPostHistoriCount')
            ->orderBy('tgl_terbit', 'desc')
            ->paginate(8);

        // if ($request->ajax()) {
        //     return view('public.post_grid_partial', ['posts' => $posts]);
        // }
        $comp = [
            'slide' => view('public/layout/slide', ['getRightData' => getRightData()]),
            'content' => view('public/post_grid',  ['posts' => $posts]),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }



    // public function postGrid(Request $request)
    // {
    //     $posts = PostModel::select(DB::raw('*, YEAR(tgl_terbit) AS year, MONTH(tgl_terbit) AS month, DAY(tgl_terbit) AS day'))
    //         ->where('post_status', '1')
    //         ->withCount('JPostHistoriCount')
    //         ->orderBy('tgl_terbit', 'desc')
    //         ->paginate(8);

    //     if ($request->ajax()) {
    //         return view('public.post_grid', compact('posts'));
    //     }

    //     return abort(404);
    // }


    // public function ambilDataPostGrid()
    // {
    //     $posts = PostModel::select(DB::raw('*, YEAR(tgl_terbit) AS year, MONTH(tgl_terbit) AS month, DAY(tgl_terbit) AS day'))
    //         //->with(['JPostKategoriRelations.JKategori'])
    //         ->where('post_status', '1')
    //         ->withCount('JPostHistoriCount')
    //         ->orderBy('tgl_terbit', 'desc')
    //         ->get();

    //     return response()->json($posts);
    // }


    public function jenis($slug)
    {
        $kat = KategoriModel::where('slug_kategori', $slug)->first();
        $id_kategori = $kat->id_kategori;

        $posts = PostModel::select(DB::raw('*, YEAR(tgl_terbit) AS year, MONTH(tgl_terbit) AS month, DAY(tgl_terbit) AS day'))
            ->where('post_status', '1')
            ->whereHas('JPostKategoriRelations.JKategori', function ($query) use ($id_kategori) {
                $query->where('id_kategori', $id_kategori);
            })
            ->withCount('JPostHistoriCount')
            ->orderBy('tgl_terbit', 'desc')
            ->paginate(1);

        $comp = [
            'slide' => "",
            'content' => view('public/post_grid', ['posts' => $posts, 'title' => $kat->nm_kategori,]),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }

    public function postarsip(Request $r, $tahun)
    {
        $tahun = $r->tahun;
        $bulan = $r->bulan;
        $bulan_str = str_pad($bulan, 2, '0', STR_PAD_LEFT); 

        $posts = PostModel::select(DB::raw('*, YEAR(tgl_terbit) AS year, MONTH(tgl_terbit) AS month, DAY(tgl_terbit) AS day'))
            ->where('post_status', '1')
            ->whereYear('tgl_terbit', $tahun)
            ->whereMonth('tgl_terbit', $bulan_str)
            ->withCount('JPostHistoriCount')
            ->orderBy('tgl_terbit', 'desc')
            ->paginate(8)
            ->withQueryString();
        $comp = [
            'slide' => "",
            'content' => view('public/post_grid', ['posts' => $posts,'title' => cek_month_v1($bulan) . " " . $tahun,]),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }

    public function page($slug)
    {

        $data = [
            'row' => LamanModel::where('slug_laman', $slug)->first(),
        ];
        $comp = [
            'slide' => "",
            'content' => view('public/getpage', $data),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }

    public function postdetail($slug)
    {
        $post =  PostModel::select(DB::raw('*, YEAR(tgl_terbit) AS year, MONTH(tgl_terbit) AS month, DAY(tgl_terbit) AS day'))
            ->where('slug_title', $slug)
            ->whereHas('JPostKategoriRelations.JKategori')
            ->withCount('JPostHistoriCount')
            ->first();


        $viewerData = [
            'post_kd' => $post->post_kd,
            'ip_address' => request()->ip(),
            'hostname' => getHostname(),
            'user_agent' => request()->header('User-Agent'),
            'referer' => URL::previous(),
        ];

        $today = now()->format('Y-m-d');
        $ipAddress = request()->ip();
        $hostname = getHostname();
        $existingData = HistoriCountPostModel::where('post_kd', $post->post_kd)
            ->where('ip_address', $ipAddress)
            ->where('hostname', $hostname)
            ->whereDate('created_at', $today)
            ->first();

        if (!$existingData) {
            HistoriCountPostModel::create($viewerData);
        }
        // dd($viewerData);
        $data = [
            'title' => $post->post_title,
            'row' => $post,
        ];
        $comp = [
            'slide' => "",
            'content' => view('public/post_detail', $data),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }



    public function galeriphoto()
    {
        $photo = PhotoModel::all();
        $photoCount = $photo->map(function ($photo) {
            $Count = PhotoDetailModel::where('id_galeri_photo', $photo->id_galeri_photo)
                ->count();
            $photo->jumlahCount = $Count;
            return $photo;
        });

        $data = [
            'title' => "GALERI PHOTO",
            'result' => $photo
        ];
        $comp = [
            'slide' => "",
            'content' => view('public/galeriphoto', $data),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }

    public function galeriphotodetail($id)
    {
        $dat = PhotoModel::where('slug_galeri_photo', $id)->first();
        $photodetail = PhotoDetailModel::where('id_galeri_photo', $dat->id_galeri_photo);

        $data = [
            'title' => $dat->nm_galeri_photo,
            'result' => $photodetail->get()
        ];
        $comp = [
            'slide' => "",
            'content' => view('public/galeriphotodetail', $data),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }

    public function galerivideo()
    {
        $video = VideoModel::all();

        $data = [
            'title' => "GALERI VIDEO",
            'result' => $video
        ];
        $comp = [
            'slide' => "",
            'content' => view('public/galerivideo', $data),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }

    public function search(Request $r)
    {
        $posts =  PostModel::select(DB::raw('*, YEAR(tgl_terbit) AS year, MONTH(tgl_terbit) AS month, DAY(tgl_terbit) AS day'))
            ->where('post_status', '1')
            ->where('post_title', 'like', "%" . $r->search . "%")
            ->withCount('JPostHistoriCount')
            ->orderBy('tgl_terbit', 'desc')
            ->paginate(8);

        //dd($posts);
        $comp = [
            'slide' => view('public/layout/slide', ['getRightData' => getRightData()]),
            'content' => view('public/post_grid',  ['posts' => $posts,'title' => "SEARCH : ".$r->search]),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }
}
