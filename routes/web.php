<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\GrafikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// otomatis generate route login/register/logout
Auth::routes();

// Dashboard / Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// CRUD untuk Wisata
Route::resource('wisata', WisataController::class);

// Menu Sidebar Tambahan
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
Route::get('/grafik-pengguna', [GrafikController::class, 'index'])->name('grafik.index');
