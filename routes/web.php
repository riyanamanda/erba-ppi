<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\InfeksiSaluranKemihController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RuangRawatInapController;
use App\Http\Controllers\SurveilansController;
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

    Route::controller(PasienController::class)
    ->group(function () {
        Route::get('pasien', 'index')->name('pasien.index');
        Route::get('pasien/create', 'create')->name('pasien.create')->middleware('can:create_pasien');
        Route::post('pasien', 'store')->name('pasien.store')->middleware('can:create_pasien');
        Route::get('pasien/{pasien}/edit', 'edit')->name('pasien.edit')->middleware('can:edit_pasien');
        Route::patch('pasien/{pasien}', 'update')->name('pasien.update')->middleware('can:edit_pasien');
        Route::delete('pasien/{pasien}', 'destroy')->name('pasien.destroy')->middleware('can:delete_pasien');
    });

    Route::controller(SurveilansController::class)
    ->group(function () {
        Route::get('surveilans', 'index')->name('surveilans.index');
        Route::get('surveilans/create', 'create')->name('surveilans.create')->middleware('can:create_surveilans');

        Route::get('surveilans/get-form', [SurveilansController::class, 'surveilans'])->name('get.form');
    });

    Route::controller(InfeksiSaluranKemihController::class)
    ->group(function () {
        Route::post('infeksi-saluran-kemih', 'store')->name('infeksi-saluran-kemih.store')->middleware('can:create_surveilans');
    });

    Route::get('/', fn () => view('pages.home'))->name('dashboard');
});

Auth::routes([
    'register' => false
]);
