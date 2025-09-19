<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\GrafikController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama (welcome page)
Route::get('/', function () {
    return view('welcome');
});

// Autentikasi (hanya jika pakai laravel/ui)
Auth::routes();

// Dashboard setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard Admin
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// CRUD untuk Wisata
Route::resource('wisata', WisataController::class);

// Menu Admin (grouping)
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');
});
