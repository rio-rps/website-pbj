<?php

namespace App\Http\Middleware;

use App\Models\KategoriModel;
use App\Models\LamanModel;
use App\Models\MenuController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShareData
{
    public function handle(Request $request, Closure $next)
    {
        $kategori = KategoriModel::all();
        view()->share('menuKategori', $kategori);

        $menulevel1 = MenuController::where('status_actived', '1')
            ->where('level_menu', '1')
            ->orderby('no_urut', 'ASC')->get();
        view()->share('menulevel1', $menulevel1);

        $menuLevel2 = MenuController::where('status_actived', '1')
            ->where('level_menu', '2')->get();
        view()->share('menuLevel2', $menuLevel2);

        $menuLevel3 = MenuController::where('status_actived', '1')
            ->where('level_menu', '3')->get();
        view()->share('menuLevel3', $menuLevel3);

        return $next($request);
    }
}
