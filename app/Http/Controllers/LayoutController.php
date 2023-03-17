<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index()
    {
        $data = [
            'content' => view('layout/content'),
        ];
        return view('layout.content', $data);
    }
}
