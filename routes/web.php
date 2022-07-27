<?php

use App\Http\Controllers\BDDokController;
use App\Http\Controllers\BDHarianController;
use App\Http\Controllers\POController;
use App\Http\Controllers\POTransaksiController;
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

Route::get('/', [BDHarianController::class, 'index'])->name('home.index');

Route::resource('bd-harian', BDHarianController::class);
Route::post('bd-harian/delete/{id}', [BDHarianController::class, 'deleteData'])->name('bd-harian.delete');
Route::post('bd-harian-dok/delete/{id}', [BDDokController::class, 'deleteData'])->name('bd-harian-dok.delete');
Route::get('bd-harian-detail/{bd_harian}', [BDHarianController::class, 'detail'])->name('bd-harian-detail.index');
Route::resource('bd-harian-dok', BDDokController::class);

// PO
Route::resource('po-harian', POController::class);

// PO Transaksi 
Route::resource('po-transaksi-harian', POTransaksiController::class);
