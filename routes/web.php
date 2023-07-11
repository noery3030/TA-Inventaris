<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FOController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\GeasController;
use App\Http\Controllers\GeopController;
use App\Http\Controllers\TamanController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\Barang1Controller;


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
    return view('auth.login');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('barang.index', [App\Http\Controllers\BarangController::class, 'index'])->name('index');

// Route::get('barang.form', [App\Http\Controllers\BarangController::class, 'create'])->name('form');

Route::resource('barang', Barang1Controller::class);

Route::resource('pos', PosController::class);

Route::resource('masjid', MasjidController::class);

Route::resource('geop', GeopController::class);

Route::resource('geas', GeasController::class);

Route::resource('fo', FOController::class);

Route::resource('taman', TamanController::class);
