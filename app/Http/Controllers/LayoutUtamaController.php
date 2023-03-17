<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutUtamaController extends Controller
{
    public function index()
    {
        return view('layout.private.beranda');
    }
}
