<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\Pengguna;
use App\Models\TempatWisata;
use App\Models\Penilaian;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home'); 
    }

    public function dashboard()
    {
        // Hitung total data
        $totalAdmin        = Administrator::count();
        $totalPengguna     = Pengguna::count();
        $totalTempatWisata = TempatWisata::count();
        $totalPenilaian    = Penilaian::count();

        // Data terbaru (ambil 5 terakhir)
        $latestAdmins   = Administrator::latest()->take(5)->get();
        $latestPengguna = Pengguna::latest()->take(5)->get();
        $latestWisata   = TempatWisata::latest()->take(5)->get();
        $latestReview   = Penilaian::with(['pengguna','tempatWisata']) // eager load biar tidak N+1 query
                            ->latest()
                            ->take(5)
                            ->get();

        // Data grafik (jumlah pengguna per bulan)
        $grafikPengguna = Pengguna::selectRaw('COUNT(*) as total, MONTH(created_at) as bulan')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->pluck('total', 'bulan'); // hasil: [bulan => total]

        // Mapping bulan
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        // Siapkan data untuk chart
        $labels = [];
        $data   = [];

        foreach ($grafikPengguna as $bulanIndex => $total) {
            $labels[] = $bulan[$bulanIndex] ?? $bulanIndex;
            $data[]   = $total;
        }

        return view('dashboard.index', compact(
            'totalAdmin',
            'totalPengguna',
            'totalTempatWisata',
            'totalPenilaian',
            'latestAdmins',
            'latestPengguna',
            'latestWisata',
            'latestReview',
            'labels',
            'data'
        ));
    }

    public function cards()
    {
        return view('dashboard.cards');
    }
}
