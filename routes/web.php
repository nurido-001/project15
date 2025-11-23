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
| Ini adalah file route utama aplikasi Wisataku.
| Pastikan semua route mengarah ke controller yang sesuai.
*/

// ==========================
// 🏠 Halaman Utama (Landing Page)
// ==========================
Route::get('/', function () {
    return view('landing'); // Tampilan utama tanpa controller
})->name('landing');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/register', fn() => redirect()->route('login'))->name('register');

Route::middleware(['auth'])->controller(HomeController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/home', 'index')->name('home');
    Route::get('/dashboard/cards', 'cards')->name('dashboard.cards');
});

Route::middleware(['auth'])->group(function () {
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

    // 🔍 Fitur pencarian wisata
    Route::get('/wisata/search', [WisataController::class, 'search'])->name('wisata.search');
});


// ==========================
// ⭐ Penilaian (Review Wisata)
// ==========================
Route::middleware(['auth'])->controller(PenilaianController::class)->group(function () {
    Route::post('/penilaian', 'store')->name('penilaian.store');
    Route::delete('/penilaian/{id}', 'destroy')->name('penilaian.destroy');
});

// 🔒 Hanya admin yang boleh melihat daftar penilaian penuh
Route::middleware(['auth', 'isAdmin'])->get('/admin/penilaian', 
    [PenilaianController::class, 'index']
)->name('penilaian.index');


// ==========================
// 👑 Admin Area (Hanya untuk Admin)
// ==========================
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD Pengguna
    Route::resource('pengguna', PenggunaController::class);

    // ==========================
    // 📈 Halaman Grafik (Sesuai folder Admin/Grafik/)
    // ==========================
    Route::get('/grafik', [GrafikController::class, 'index'])
        ->name('grafik.index');
});
