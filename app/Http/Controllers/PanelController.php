<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            //return view('layout.main');
            return view('private.layout.beranda');
        } else {
            return redirect('/panel');
        }
    }
}
