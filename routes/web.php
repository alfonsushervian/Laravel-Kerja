<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfesiController;
use App\Http\Controllers\PaginationController;

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

Route::get('/', function () {
    return view('index');
});


Route::get('/halo', function () {
    return "Halo semuanya";
});


Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/show_html', [HomeController::class, 'show_html']);
Route::get('/home/belajar_blade', [HomeController::class, 'belajar_blade']);
Route::get('/home/penggunaan_layout', [HomeController::class, 'penggunaan_layout']);

Route::get('/home/contoh', [HomeController::class, 'contoh']);
Route::post('/home/contoh', [HomeController::class, 'contoh_post']);

Route::resource('user', UserController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('profesi', ProfesiController::class);
//Route get => pegawai => index
//Route get => pegawai/create => create
//Route post => pegawai => store
//Route get => pegawai/{id} => show
//Route put/patch => pegawai/{id} => update
//Route delete => pegawai/{id} => delete
//Route get => pegawai/{id}/edit => edit

// Route::get('/pagination', [PaginationController::class, 'index']);
// Route::get('/pagination/show_api', [PaginationController::class, 'show_api']);
