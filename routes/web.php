<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\LoginController;

// ==========================
// Halaman utama (sementara arahkan ke daftar wisata)
// ==========================
Route::get('/', [WisataController::class, 'index'])->name('landing');

// ==========================
// Autentikasi
// ==========================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return redirect()->route('login');
})->name('register');

// ==========================
// Dashboard user setelah login
// ==========================
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ==========================
// Resource Wisata (full CRUD)
// ==========================
Route::resource('wisata', WisataController::class);
// otomatis tersedia route:
// index, create, store, show, edit, update, destroy

// ==========================
// Menu Admin (prefix /admin)
// ==========================
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('pengguna', PenggunaController::class);
    Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');
});
