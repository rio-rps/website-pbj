<?php

namespace App\Http\Controllers;

use App\Models\HistoriCountModel;
use App\Models\HistoriCountPostModel;
use App\Models\HistoriPostModel;
use App\Models\KategoriModel;
use App\Models\KategoriPengaduanModel;
use App\Models\LamanModel;
use App\Models\PengaduanModel;
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
use Illuminate\Support\Facades\Validator;


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
            ->paginate(8);

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
            'content' => view('public/post_grid', ['posts' => $posts, 'title' => cek_month_v1($bulan) . " " . $tahun,]),
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
            'content' => view('public/post_grid',  ['posts' => $posts, 'title' => "SEARCH : " . $r->search]),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }

    public function pengaduan()
    {

        $data = [
            'title' => "FORM PENGADUAN",
            'resultKatPeng' => KategoriPengaduanModel::orderBy('no_urut', 'asc')->get()
        ];
        $comp = [
            'slide' => "",
            'content' => view('public/pengaduan', $data),
            'right' => view('public/layout/right', ['getRightData' => getRightData()]),
        ];
        return view('public.layout.main', $comp);
    }

    public function storePengaduan(Request $r)
    {
        if (request()->ajax()) {
            $validator = Validator::make($r->all(), [
                'nm_pelapor' => 'required',
                'email' => 'required|email',
                'no_hp' => 'required|numeric',
                'id_kategori_pengaduan' => 'required',
                'tgl_kejadian' => 'required',
                'lokasi_kejadian' => 'required',
                'oknum_yang_terlibat' => 'required',
                'uraian' => 'required',
                'upload_bukti_dukung' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ], [
                'nm_pelapor.required' => 'Nama Pelapor Tidak Boleh Kosong',
                'email.required' => 'Email Tidak Boleh Kosong',
                'email.email' => 'Format Email Salah',
                'no_hp.required' => 'No Hp Tidak Boleh Kosong',
                'no_hp.numeric' => 'Format Nomor Hp harus Angka',
                'id_kategori_pengaduan.required' => 'Jenis Pengaduan Tidak Boleh Kosong',
                'tgl_kejadian.required' => 'Tanggal kejadian Tidak Boleh Kosong',
                'lokasi_kejadian.required' => 'Lokasi Kejadian Tidak Boleh Kosong',
                'oknum_yang_terlibat.required' => 'Oknum yang Terlibat Tidak Boleh Kosong',
                'uraian.required' => 'Uraian Tidak Boleh Kosong',
                'upload_bukti_dukung.mimes' => 'Upload Bukti Pendukung Hanya di perbolehkan ekstensi JPEG, JPG, PNG',
            ]);




            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json(['errors' => $errors], 422);
            } else {
                $gambar_name = "";
                if ($image = $r->file('upload_bukti_dukung')) {
                    $gambar_path = public_path('images/pengaduan');
                    $gambar_ekstensi = $image->getClientOriginalExtension();
                    $gambar_name = date('ymdhis') . "." . $gambar_ekstensi;
                    $image->move($gambar_path, $gambar_name);
                }

                $post = PengaduanModel::create([
                    'nm_pelapor'  => $r->nm_pelapor,
                    'email' => $r->email,
                    'no_hp' => $r->no_hp,
                    'id_kategori_pengaduan' => $r->id_kategori_pengaduan,
                    'tgl_kejadian' => $r->tgl_kejadian,
                    'lokasi_kejadian' => $r->lokasi_kejadian,
                    'oknum_yang_terlibat' => $r->oknum_yang_terlibat,
                    'uraian' => $r->uraian,
                    'upload_bukti_dukung' => $gambar_name,
                    'email' => $r->email,
                    'tgl_kirim' =>  date('Y-m-d H:i:s'),
                ]);
                return response()->json([
                    'success' => 'Pengaduan Anda Berhasil dikirim dan akan kami tindaklanjuti, Terimakasih',
                    'action' => 'storePengaduan',
                    'route' => route('pengaduan')
                ]);
            }
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
