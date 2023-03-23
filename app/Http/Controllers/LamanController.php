<?php

namespace App\Http\Controllers;

use App\Models\LamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables as DataTablesDataTables;

class LamanController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'LAMAN',
        ];
        return view('private/laman/view')->with($data);
    }


    public function show()
    {
        if (request()->ajax()) {
            return  DataTablesDataTables::of(LamanModel::query()->orderby('no_urut', 'ASC'))
                ->addColumn('action', 'private.laman.action')
                ->make(true);
        } else {
            exit('Maaf Tidak Dapat diproses...');
        }
    }
}
