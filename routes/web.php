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

Route::resource('ruang-rawat-inap', RuangRawatInapController::class);
Route::resource('dokter', DokterController::class);

Route::get('/', function () {
    return view('pages.home');
})->name('dashboard');

Auth::routes([
    'register' => false
]);
