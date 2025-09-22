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
    return view('landing');
});

// Autentikasi (jika pakai laravel/ui)
Auth::routes();

// Dashboard user setelah login
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [LoginController::class, 'login']);

// CRUD untuk Wisata
Route::resource('wisata', WisataController::class);

// Menu Admin (semua dalam prefix /admin)
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index'); // Dashboard admin
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');
});
