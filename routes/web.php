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
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
});

// Nonaktifkan register (redirect ke login)
Route::get('/register', fn() => redirect()->route('login'))->name('register');


// ==========================
// 📊 Area Dashboard (Sementara Tanpa Middleware untuk Tes)
// ==========================

// ⚠️ Saat produksi nanti, aktifkan middleware 'auth' di bawah ini.
// Route::middleware('auth')->group(function () {

    // === Dashboard Umum ===
    Route::controller(HomeController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/home', 'index')->name('home');
        Route::get('/dashboard/cards', 'cards')->name('dashboard.cards');
    });

    // === 🌄 CRUD Wisata ===
    Route::resource('wisata', WisataController::class)
        ->parameters(['wisata' => 'wisata'])
        ->names([
            'index' => 'wisata.index',
            'create' => 'wisata.create',
            'store' => 'wisata.store',
            'show' => 'wisata.show',
            'edit' => 'wisata.edit',
            'update' => 'wisata.update',
            'destroy' => 'wisata.destroy',
        ]);

    // === ⭐ Penilaian (Review Wisata) ===
    Route::controller(PenilaianController::class)->group(function () {
        // untuk form review di wisata/show.blade.php
        Route::post('/penilaian', 'store')->name('penilaian.store');

        // untuk hapus review
        Route::delete('/penilaian/{id}', 'destroy')->name('penilaian.destroy');

        // opsional: admin ingin lihat semua penilaian
        Route::get('/admin/penilaian', 'index')->name('penilaian.index');
    });

    // === 👑 Admin Area ===
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // CRUD pengguna
        Route::resource('pengguna', PenggunaController::class);

        // Halaman grafik
        Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');
    });

// }); // END middleware('auth')
