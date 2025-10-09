<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\Pengguna;
use App\Models\Penilaian;
use App\Models\Wisata;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        // Pastikan hanya user yang sudah login bisa mengakses
        $this->middleware('auth');
    }

    // ==========================
    // Halaman utama (home)
    // ==========================
    public function index()
    {
        // Jika view dashboard.index ada, arahkan ke sana
        if (View::exists('dashboard.index')) {
            return $this->dashboard();
        }

        // Jika belum ada, tampilkan pesan aman
        return view('home', [
            'message' => 'Selamat datang di aplikasi WisataKu! Halaman dashboard belum dibuat sepenuhnya.'
        ]);
    }

    // ==========================
    // Dashboard utama
    // ==========================
    public function dashboard()
    {
        // Hitung total data
        $totalAdmin     = Administrator::count();
        $totalPengguna  = Pengguna::count();
        $totalWisata    = Wisata::count();
        $totalPenilaian = Penilaian::count();

        // Data terbaru
        $latestAdmins   = Administrator::latest()->take(5)->get();
        $latestPengguna = Pengguna::latest()->take(5)->get();
        $latestWisata   = Wisata::latest()->take(5)->get();

        // Review terbaru (dengan relasi pengguna & wisata)
        $latestReview = Penilaian::with(['pengguna', 'wisata'])
            ->latest()
            ->take(5)
            ->get();

        // Grafik pengguna per bulan
        $grafikPengguna = Pengguna::selectRaw('COUNT(*) as total, MONTH(created_at) as bulan')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        // Nama bulan
        $bulanNama = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        $labels = [];
        $data = [];
        foreach ($grafikPengguna as $bulanIndex => $total) {
            $labels[] = $bulanNama[$bulanIndex] ?? $bulanIndex;
            $data[] = $total;
        }

        return view('dashboard.index', compact(
                'totalAdmin',
                'totalPengguna',
                'totalWisata',
                'totalPenilaian',
                'latestAdmins',
                'latestPengguna',
                'latestWisata',
                // 'latestReview',
                'labels',
                'data'
            ));

        // Pastikan view-nya ada, jika belum tampilkan fallback
        if (View::exists('dashboard.index')) {
            
        } else {
            return view('home', [
                'message' => 'Dashboard belum tersedia, namun data sudah siap.'
            ]);
        }
    }

    // ==========================
    // Halaman tambahan (contoh kartu)
    // ==========================
    public function cards()
    {
        if (View::exists('dashboard.cards')) {
            return view('dashboard.cards');
        }

        return view('home', [
            'message' => 'Halaman cards belum dibuat.'
        ]);
    }
}
