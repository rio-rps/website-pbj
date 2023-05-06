<?php

namespace App\Http\Controllers;

use App\Models\HistoriLoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    public function index()
    {
        //echo bcrypt('123456');
        if (Auth::user()) {
            $user = Auth::user();
            return redirect()->intended('/panel');
        }

        return view('login.view_login');
    }

    public function proses(Request $r)
    {
        $r->validate(
            [
                'email' => 'required', // dari inputan
                'password' => 'required', // dari inputan
            ],
            [
                'email.required' => 'Email tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ],
        );

        $kredensial = $r->only('email', 'password'); // only hanya di gunakan pada user dan password
        if (Auth::attempt($kredensial)) { // attemp di gunakan untuk pengecek an
            $r->session()->regenerate(); // di daftar kan session tiap login
            $user = Auth::user();
            // if ($user->level == '1') {
            //     return redirect()->intended('beranda');
            // } elseif ($user->level == '2') {
            //     return redirect()->intended('kasir');
            // }
            if ($user) {
                $this->pengunjungWebsite($user->id);
                return redirect()->intended('/panel');
            }
        }


        return back()->withErrors([
            'keterangan' => "Maaf email / password Anda salah"
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function pengunjungWebsite($id_user)
    {
        $viewerData = [
            'ip_address' => request()->ip(),
            'hostname' => getHostname(),
            'user_agent' => request()->header('User-Agent'),
            'referer' => URL::previous(),
            'id_user' => $id_user,
        ];
        HistoriLoginModel::create($viewerData);
    }
}
