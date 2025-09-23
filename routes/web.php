<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// Halaman utama (landing page)
// ==========================
Route::get('/', function () {
    return view('landing');
})->name('landing');

// ==========================
// Autentikasi
// ==========================

// Jika pakai Laravel/UI atau Breeze, aktifkan ini:
// Auth::routes();

// Jika pakai custom manual:
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Kalau tidak ingin ada register, arahkan saja ke login
Route::get('/register', function () {
    return redirect()->route('login');
})->name('register');

// ==========================
// Dashboard user setelah login
// ==========================
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ==========================
// CRUD untuk Wisata
// ==========================
Route::resource('wisata', WisataController::class);

// ==========================
// Menu Admin (prefix /admin)
// ==========================
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');
});
