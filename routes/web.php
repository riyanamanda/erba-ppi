<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\RuangRawatInapController;
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

Route::middleware('auth')
->group(function () {
    Route::controller(RuangRawatInapController::class)
    ->group(function () {
        Route::get('ruang-rawat-inap', 'index')->name('ruang-rawat-inap.index');
        Route::get('ruang-rawat-inap/create', 'create')->name('ruang-rawat-inap.create')->middleware('can:create_ruang_rawat_inap');
        Route::post('ruang-rawat-inap', 'store')->name('ruang-rawat-inap.store')->middleware('can:create_ruang_rawat_inap');
        Route::get('ruang-rawat-inap/{ruang_rawat_inap}/edit', 'edit')->name('ruang-rawat-inap.edit')->middleware('can:update_ruang_rawat_inap');
        Route::patch('ruang-rawat-inap/{ruang_rawat_inap}', 'update')->name('ruang-rawat-inap.update')->middleware('can:update_ruang_rawat_inap');
        Route::delete('ruang-rawat-inap/{ruang_rawat_inap}', 'destroy')->name('ruang-rawat-inap.destroy')->middleware('can:delete_ruang_rawat_inap');
    });

    Route::controller(DokterController::class)
    ->group(function () {
        Route::get('dokter', 'index')->name('dokter.index');
        Route::get('dokter/create', 'create')->name('dokter.create')->middleware('can:create_dokter');
        Route::post('dokter', 'store')->name('dokter.store')->middleware('can:create_dokter');
        Route::get('dokter/{dokter}/edit', 'edit')->name('dokter.edit')->middleware('can:update_dokter');
        Route::patch('dokter/{dokter}', 'update')->name('dokter.update')->middleware('can:update_dokter');
        Route::delete('dokter/{dokter}', 'destroy')->name('dokter.destroy')->middleware('can:delete_dokter');
    });

    Route::get('/', fn () => view('pages.home'))->name('dashboard');
});

Auth::routes([
    'register' => false
]);
