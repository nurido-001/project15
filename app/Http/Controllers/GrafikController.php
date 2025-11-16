<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GrafikController extends Controller
{
    /**
     * Tampilkan grafik statistik wisata & pengunjung.
     * Route: GET /admin/grafik
     * Middleware: auth, isAdmin
     */
    public function index()
    {
        // === Ambil data wisata dari database ===
        $wisatasDB = Wisata::select('nama', 'harga_tiket')->get();

        $wisatas = $wisatasDB->isNotEmpty()
            ? $wisatasDB
            : collect([
                ['nama' => 'Tembok Besar Cina', 'harga_tiket' => 700000],
                ['nama' => 'Gunung Bromo', 'harga_tiket' => 600000],
                ['nama' => 'Pura Ulun Danu Beratan', 'harga_tiket' => 450000],
                ['nama' => 'Sydney Opera House', 'harga_tiket' => 650000],
                ['nama' => 'Patung Liberty', 'harga_tiket' => 500000],
                ['nama' => 'Pantai Indah', 'harga_tiket' => 25000],
            ]);

        // === Daftar tanggal 30 hari terakhir ===
        $tanggal = [];
        for ($i = 29; $i >= 0; $i--) {
            $tanggal[] = Carbon::now()->subDays($i)->format('d M');
        }

        // === Simulasi jumlah pengunjung harian ===
        $pengunjung = [];
        for ($i = 29; $i >= 0; $i--) {
            $day = Carbon::now()->subDays($i);
            $pengunjung[] = $day->isWeekend()
                ? rand(120, 180)   // Weekend ramai
                : rand(60, 130);   // Weekday sedang
        }

        // === Kirim data ke view sebagai array ===
        return view('Grafik.index', [
            'wisatas'    => $wisatas->toArray(),
            'tanggal'    => $tanggal,
            'pengunjung' => $pengunjung,
        ]);
    }
}
