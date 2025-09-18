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

// Otomatis generate route login/register/logout
Auth::routes();

// Dashboard / Home (setelah login)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard Admin (statistik ringkasan)
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Halaman Dashboard Cards (contoh UI dengan cards & masonry)
Route::get('/dashboard/cards', function () {
    return view('dashboard.index');
})->name('dashboard.cards');

// CRUD untuk Wisata
Route::resource('wisata', WisataController::class);

// Menu Sidebar Tambahan
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/grafik-pengguna', [GrafikController::class, 'index'])->name('grafik.index');
});
