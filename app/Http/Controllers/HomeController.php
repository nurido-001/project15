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
        // hitung total data
        $totalAdmin        = Administrator::count();
        $totalPengguna     = Pengguna::count();
        $totalTempatWisata = TempatWisata::count();
        $totalPenilaian    = Penilaian::count();

        // data terbaru
        $latestAdmins   = Administrator::latest()->take(5)->get();
        $latestPengguna = Pengguna::latest()->take(5)->get();
        $latestWisata   = TempatWisata::latest()->take(5)->get();
        $latestReview   = Penilaian::latest()->take(5)->get();

        // data grafik (jumlah pengguna per bulan)
        $grafikPengguna = Pengguna::select(
                DB::raw('COUNT(*) as total'),
                DB::raw('MONTH(created_at) as bulan')
            )
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        return view('dashboard.index', compact(
            'totalAdmin',
            'totalPengguna',
            'totalTempatWisata',
            'totalPenilaian',
            'latestAdmins',
            'latestPengguna',
            'latestWisata',
            'latestReview',
            'grafikPengguna',
            'bulan'
        ));
    }

    public function cards()
    {
        return view('dashboard.cards');
    }
}
