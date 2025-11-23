<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Administrator;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB; // Menggunakan DB facade untuk contoh log kunjungan

class GrafikController extends Controller
{
    /**
     * Menampilkan dashboard dengan dua jenis grafik.
     * Grafik Batang: Jumlah data di sistem (User, Admin, Wisata).
     * Grafik Garis: Data pengunjung 30 hari terakhir (menggunakan dummy data).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 1. Grafik Batang: Jumlah Data (Menggunakan data nyata dari Models)
        $jumlahPengguna = User::count();
        $jumlahAdmin = Administrator::count();
        $jumlahWisata = Wisata::count();

        // Label dan Data untuk Grafik Batang (Jumlah Data)
        $labels = ['Pengguna', 'Administrator', 'Wisata'];
        $data = [$jumlahPengguna, $jumlahAdmin, $jumlahWisata];

        // 2. Grafik Garis: Dummy Data Pengunjung 30 Hari (untuk menampilkan data yang pasti ada)
        $tanggal = [];
        $pengunjung = [];

        // Loop untuk 30 hari ke belakang (dari 29 hari yang lalu sampai hari ini)
        for ($i = 29; $i >= 0; $i--) {
            // Label untuk sumbu X (misalnya: 23 Nov)
            $tanggal[] = Carbon::now()->subDays($i)->format('d M');
            
            // Dummy data pengunjung per hari (antara 50 sampai 200)
            $pengunjung[] = rand(50, 200); 
        }

        // Meneruskan semua data yang diperlukan ke view
        return view('Admin.grafik.grafik', compact(
            'labels', 'data', 'tanggal', 'pengunjung'
        ));
    }
}