<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\Pengguna;
use App\Models\TempatWisata;
use App\Models\Penilaian;
use App\Models\GrafikPengguna;

class AdminController extends Controller
{
    public function index()
    {
        // Statistik singkat
        $totalAdmin        = Administrator::count();
        $totalPengguna     = Pengguna::count();
        $totalTempatWisata = TempatWisata::count();
        $totalPenilaian    = Penilaian::count();
        $totalGrafik       = GrafikPengguna::count();

        // Data terbaru (limit 5)
        $latestUsers   = Pengguna::latest()->take(5)->get();
        $latestWisata  = TempatWisata::latest()->take(5)->get();
        $latestReview  = Penilaian::latest()->take(5)->get();

        return view('dashboard.index', compact(
            'totalAdmin',
            'totalPengguna',
            'totalTempatWisata',
            'totalPenilaian',
            'totalGrafik',
            'latestUsers',
            'latestWisata',
            'latestReview'
        ));
    }
}
