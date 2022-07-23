<?php

use App\Http\Controllers\BDHarianController;
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

Route::get('/', [BDHarianController::class, 'index']);

Route::resource('bd-harian', BDHarianController::class);
Route::get('bd-harian-detail/{bd_harian}', [BDHarianController::class, 'detail'])->name('bd-harian-detail.index');
Route::post('bd-harian-dok', [BDHarianController::class, 'storeBdDok'])->name('bd-harian-dok.store');
Route::post('bd-harian-desc', [BDHarianController::class, 'storeBdDesc'])->name('bd-harian-desc.store');