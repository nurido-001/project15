<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\User;
use App\Models\Wisata;

class AdminController extends Controller
{
    public function index()
    {
        // Statistik singkat
        $totalAdmin = User::where('role', 'admin')->count();
        $totalPengguna = User::where('role', 'pengguna')->count();
        $totalWisata = Wisata::count();
        $totalPenilaian = Penilaian::count();

        // Data terbaru (limit 5)
        $latestUsers = User::latest()->take(5)->get();
        $latestWisata = Wisata::latest()->take(5)->get();
        $latestReview = Penilaian::latest()->take(5)->get();

        return view('Admin.index', compact(
            'totalAdmin',
            'totalPengguna',
            'totalWisata',
            'totalPenilaian',
            'latestUsers',
            'latestWisata',
            'latestReview'
        ));
    }
}
