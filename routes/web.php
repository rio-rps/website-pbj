<?php

use App\Http\Controllers\DPAController;
use App\Http\Controllers\DPARincianController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\JenisNPDController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LamanController;
use App\Http\Controllers\LamanDetailController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LayoutUtamaController;
use App\Http\Controllers\LinkTerkaitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MappingJenisNPDController;
use App\Http\Controllers\MappingNPDDokumenContoller;
use App\Http\Controllers\NPDController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengaturanAkunController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PhotoDetailController;
use App\Http\Controllers\PhotoRincianController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SlideShowController;
use App\Http\Controllers\TTDDokumenController;
use App\Http\Controllers\UnitBidangController;
use App\Http\Controllers\UserSessionController;
use App\Http\Controllers\VideoController;
use App\Models\DokumenModel;
use App\Models\JenisDokumenModel;
use App\Models\KategoriModel;
use App\Models\UnitBidangModel;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('/', [LayoutController::class, 'index'])->name('auth');
//Route::get('login', [LoginController::class, 'index'])->name('login');
//Route::get('beranda', [BerandaController::class, 'index'])->middleware('auth');
Route::get('/', [LayoutController::class, 'index'])->name('index');
Route::get('/page/{slug}', [LayoutController::class, 'page'])->name('page');
Route::get('/jenis/{slug}', [LayoutController::class, 'jenis'])->name('jenis');
Route::get('/postdetail/{slug}', [LayoutController::class, 'postdetail'])->name('postdetail');
Route::get('/postarsip/{tahun}', [LayoutController::class, 'postarsip'])->name('postarsip');
Route::get('/galeriphoto', [LayoutController::class, 'galeriphoto'])->name('galeriphoto');
Route::get('/galeriphotodetail/{slug}', [LayoutController::class, 'galeriphotodetail'])->name('galeriphotodetail');
Route::get('/galerivideo', [LayoutController::class, 'galerivideo'])->name('galerivideo');
Route::get('/ambilDataPostGrid', [LayoutController::class, 'ambilDataPostGrid'])->name('ambilDataPostGrid');
Route::get('/post_grid', [LayoutController::class, 'post_grid'])->name('post_grid');
Route::post('/search', [LayoutController::class, 'search'])->name('search');


Route::get('/panel', [PanelController::class, 'index'])->name('panel.index');

Route::controller(LoginController::class)->group(function () {
    route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout')->name('logout');
});

// Route::post('/image-upload', function (Request $request) {
//     $path = $request->file('image')->store('public/images');
//     return response()->json(['file_path' => asset($path)]);
// })->name('image.upload');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        // UMUM
        Route::get('pengaturanakun', [PengaturanAkunController::class, 'index'])->name('pengaturanakun.index');
        Route::put('pengaturanakun/updatepassword/{id}', [PengaturanAkunController::class, 'updatepassword'])->name('pengaturanakun.updatepassword');
        Route::put('pengaturanakun/updateemail', [PengaturanAkunController::class, 'updateemail'])->name('pengaturanakun.updateemail');


        //admin

        Route::get('post/editstatus/{id}', [PostController::class, 'editstatus'])->name('post.editstatus');
        Route::put('post/updatestatus/{id}', [PostController::class, 'updatestatus'])->name('post.updatestatus');

        Route::resource('slideshow', SlideShowController::class);
        Route::resource('linkterkait', LinkTerkaitController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('photo', PhotoController::class);
        Route::resource('photodetail', PhotoDetailController::class);
        Route::resource('video', VideoController::class);
        Route::resource('laman', LamanController::class);
        Route::resource('lamandetail', LamanDetailController::class);
        Route::resource('post', PostController::class);
        Route::resource('dokumen', DokumenModel::class);
    });
});



// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['cekUserLogin:1']], function () {

//         Route::post('dparincian/do_save_getModal_addpelimpahanrek', [DPARincianController::class, 'do_save_getModal_addpelimpahanrek'])->name('dparincian.do_save_getModal_addpelimpahanrek');

//         Route::resource('ttddokumen', TTDDokumenController::class);
//     });

//     Route::group(['middleware' => ['cekUserLogin:3']], function () {
//     });
// });
