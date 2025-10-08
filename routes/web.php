<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenilaianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// 🏠 Halaman Utama (Landing Page)
// ==========================
Route::get('/', function () {
    return view('landing'); // tampilan utama (tanpa controller)
})->name('landing');

// ==========================
// 🔐 Autentikasi
// ==========================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Nonaktifkan register (redirect ke login)
Route::get('/register', fn() => redirect()->route('login'))->name('register');

// ==========================
// 📊 Area Dashboard (sementara tanpa middleware agar bisa dites)
// ==========================

// Route::middleware('auth')->group(function () {

    // Dashboard umum
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard/cards', [HomeController::class, 'cards'])->name('dashboard.cards');

    // 🌄 CRUD Wisata
    Route::resource('wisata', WisataController::class)
        ->parameters(['wisata' => 'wisata']);

    // ⭐ Penilaian (Review Wisata)
    Route::resource('penilaian', PenilaianController::class)->only([
        'store', 'destroy'
    ]);

    // 👑 Admin Area
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('pengguna', PenggunaController::class);
        Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');
    });

// });
