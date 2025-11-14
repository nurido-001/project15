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
        // === 1️⃣ Ambil semua wisata untuk grafik harga tiket ===
        // Pastikan tabel wisatas memiliki kolom 'nama' dan 'harga_tiket'
        $wisatas = Wisata::select('nama', 'harga_tiket')->get();

        // === 2️⃣ Buat daftar tanggal 30 hari terakhir ===
        $tanggal = collect();
        for ($i = 29; $i >= 0; $i--) {
            $tanggal->push(Carbon::now()->subDays($i)->format('d M'));
        }

        // === 3️⃣ (Sementara) Simulasi jumlah pengunjung harian ===
        // Nantinya bisa diganti dengan data asli dari tabel 'penilaians' atau 'kunjungan'
        $pengunjung = $tanggal->map(fn () => rand(50, 200));

        // === 4️⃣ Kirim semua data ke view ===
        return view('Grafik.index', [
            'wisatas' => $wisatas,
            'tanggal' => $tanggal,
            'pengunjung' => $pengunjung,
        ]);
    }
}
