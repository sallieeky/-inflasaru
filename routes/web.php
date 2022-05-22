<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SuratController;
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

Route::middleware(['auth'])->group(function () {

  Route::middleware(['adminonly'])->group(function () {
    Route::get('/data-sistem', [DashboardController::class, 'dataSistem']);
    Route::post('/restore-database', [DashboardController::class, 'restoreDatabase']);



    Route::get('/data-user', [DashboardController::class, 'dataUser']);
    Route::post('/data-user/tambah', [DashboardController::class, 'tambahUser']);
    Route::post('/data-user/edit/{user}', [DashboardController::class, 'editUser']);
    Route::get('/data-user/hapus/{user}', [DashboardController::class, 'hapusUser']);
  });

  Route::get('/', [DashboardController::class, 'home']);
  Route::get('/profil', [DashboardController::class, 'profil']);
  Route::post('/profil/edit/{user}', [DashboardController::class, 'editProfil']);
  Route::post('/profil/ganti-password/{user}', [DashboardController::class, 'gantiPasswordProfil']);


  Route::get('/arsip/no-arsip', [ArsipController::class, 'noArsip']);
  Route::post('/arsip/no-arsip/tambah', [ArsipController::class, 'tambahNoArsip']);
  Route::post('/arsip/no-arsip/edit/{arsip}', [ArsipController::class, 'editNoArsip']);
  Route::get('/arsip/no-arsip/hapus/{arsip}', [ArsipController::class, 'hapusNoArsip']);

  Route::get('/arsip/surat-masuk', [ArsipController::class, 'suratMasuk']);
  Route::get('/arsip/surat-keluar', [ArsipController::class, 'suratKeluar']);


  Route::get('/laporan/surat-masuk', [LaporanController::class, 'suratMasuk']);
  Route::get('/laporan/surat-keluar', [LaporanController::class, 'suratKeluar']);


  Route::get('/surat/surat-masuk', [SuratController::class, 'suratMasuk']);
  Route::post('/surat/surat-masuk/tambah', [SuratController::class, 'tambahSuratMasuk']);
  Route::post('/surat/surat-masuk/edit/{suratmasuk}', [SuratController::class, 'editSuratMasuk']);
  Route::get('/surat/surat-masuk/hapus/{suratmasuk}', [SuratController::class, 'hapusSuratMasuk']);

  Route::get('/surat/surat-keluar', [SuratController::class, 'suratKeluar']);
  Route::post('/surat/surat-keluar/tambah', [SuratController::class, 'tambahSuratKeluar']);
  Route::post('/surat/surat-keluar/edit/{suratkeluar}', [SuratController::class, 'editSuratKeluar']);
  Route::get('/surat/surat-keluar/hapus/{suratkeluar}', [SuratController::class, 'hapusSuratKeluar']);

  Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'loginPost']);
