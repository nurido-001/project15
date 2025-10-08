<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Pengguna;
use App\Models\Wisata;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total data
        $totalAdmin = Administrator::count();
        $totalPengguna = Pengguna::count();
        $totalWisata = Wisata::count();
        $totalPenilaian = Penilaian::count();

        // Ambil data terbaru
        $latestAdmins = Administrator::latest()->take(5)->get();
        $latestPengguna = Pengguna::latest()->take(5)->get();
        $latestWisata = Wisata::latest()->take(5)->get();
        $latestReview = Penilaian::with(['pengguna', 'wisata'])->latest()->take(5)->get();

        // Grafik pengguna per bulan
        $grafikPengguna = Pengguna::selectRaw('COUNT(*) as total, MONTH(created_at) as bulan')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan');

        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        $labels = [];
        $data = [];

        foreach ($grafikPengguna as $bulanIndex => $total) {
            $labels[] = $bulan[$bulanIndex] ?? $bulanIndex;
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
            'latestReview',
            'labels',
            'data'
        ));
    }
}
