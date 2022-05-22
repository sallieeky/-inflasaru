<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SuratController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/surat/surat-masuk/update-disposisi/{suratmasuk}', [SuratController::class, 'apiUpdateDisposisi']);
Route::post('/arsip/surat-masuk/update-arsip/{suratmasuk}', [SuratController::class, 'apiUpdateIdArsipMasuk']);
Route::post('/arsip/surat-keluar/update-arsip/{suratkeluar}', [SuratController::class, 'apiUpdateIdArsipKeluar']);

Route::post('/get-laporan-surat-masuk', [LaporanController::class, 'getLaporanSuratMasuk']);
Route::post('/get-laporan-surat-keluar', [LaporanController::class, 'getLaporanSuratKeluar']);

Route::get('/backup-database', [DashboardController::class, 'backupDatabase']);
