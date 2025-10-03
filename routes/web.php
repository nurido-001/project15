<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenilaianController; // ✅ tambahkan controller untuk review

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
Route::get('/register', fn() => redirect()->route('login'))->name('register');

// ==========================
// Dashboard (semua role)
// ==========================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard/cards', [HomeController::class, 'cards'])->name('dashboard.cards');

    // ==========================
    // Wisata CRUD
    // ==========================
    Route::resource('wisata', WisataController::class)
        ->parameters(['wisata' => 'wisata']); // 🔥 Fix biar {wisata} bukan {wisatum}

    // ==========================
    // Penilaian (Review)
    // ==========================
    Route::resource('penilaian', PenilaianController::class)->only([
        'store', 'destroy'
    ]);

    // ==========================
    // Admin khusus
    // ==========================
    Route::prefix('admin')->group(function () {
        // Dashboard Admin
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // Pengguna CRUD
        Route::resource('pengguna', PenggunaController::class);

        // Grafik
        Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');
    });
});
