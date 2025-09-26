<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\LoginController;

// ==========================
// Halaman utama (landing page -> daftar wisata)
// ==========================
Route::get('/', function () {
    return view('landing');
});

// ==========================
// Autentikasi
// ==========================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// redirect register ke login (disable register)
Route::get('/register', function () {
    return redirect()->route('login');
})->name('register');

// ==========================
// Dashboard (satu untuk semua role)
// ==========================
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/cards', [HomeController::class, 'cards'])->name('dashboard.cards');

    // Resource Wisata (CRUD lengkap)
    Route::resource('wisata', WisataController::class);

    // ==========================
    // Menu Admin (khusus role admin)
    // ==========================
    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('pengguna', PenggunaController::class);
        Route::get('/grafik', [GrafikController::class, 'index'])->name('admin.grafik');
    });
});
