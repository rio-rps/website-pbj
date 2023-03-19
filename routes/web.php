<?php

use App\Http\Controllers\DPAController;
use App\Http\Controllers\DPARincianController;
use App\Http\Controllers\JenisDokumenController;
use App\Http\Controllers\JenisNPDController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LayoutUtamaController;
use App\Http\Controllers\LinkTerkaitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MappingJenisNPDController;
use App\Http\Controllers\MappingNPDDokumenContoller;
use App\Http\Controllers\NPDController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PhotoDetailController;
use App\Http\Controllers\PhotoRincianController;
use App\Http\Controllers\SlideShowController;
use App\Http\Controllers\TTDDokumenController;
use App\Http\Controllers\UnitBidangController;
use App\Models\JenisDokumenModel;
use App\Models\KategoriModel;
use App\Models\UnitBidangModel;
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
Route::get('/utama', [LayoutUtamaController::class, 'index'])->name('layoututama.index');


//admin
Route::resource('slideshow', SlideShowController::class);
Route::resource('linkterkait', LinkTerkaitController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('photo', PhotoController::class);
Route::resource('photodetail', PhotoDetailController::class);

// Route::controller(LoginController::class)->group(function () {
//     route::get('login', 'index')->name('login');
//     Route::post('login/proses', 'proses');
//     Route::get('logout', 'logout')->name('logout');
// });

// Route::group(['middleware' => ['auth']], function () {
//     Route::group(['middleware' => ['cekUserLogin:1']], function () {

//         Route::post('dparincian/do_save_getModal_addpelimpahanrek', [DPARincianController::class, 'do_save_getModal_addpelimpahanrek'])->name('dparincian.do_save_getModal_addpelimpahanrek');

//         Route::resource('ttddokumen', TTDDokumenController::class);
//     });

//     Route::group(['middleware' => ['cekUserLogin:3']], function () {
//     });
// });
