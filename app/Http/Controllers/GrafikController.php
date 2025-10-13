<?php

namespace App\Http\Controllers;

use App\Models\Pengguna; // ✅ gunakan model yang kamu pakai
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class GrafikController extends Controller
{
    /**
     * Tampilkan grafik pengguna dan admin dalam 30 hari terakhir.
     */
    public function index()
    {
        // Rentang waktu: 30 hari terakhir
        $endDate = Carbon::now();
        $startDate = $endDate->copy()->subDays(29);

        // Siapkan daftar tanggal (30 hari ke belakang)
        $dates = collect();
        for ($i = 0; $i < 30; $i++) {
            $dates->push($startDate->copy()->addDays($i)->format('Y-m-d'));
        }

        // Ambil semua data pengguna dalam 30 hari (hanya 1 query besar)
        $pengguna = Pengguna::whereBetween('created_at', [$startDate->startOfDay(), $endDate->endOfDay()])
            ->selectRaw('DATE(created_at) as date, role, COUNT(*) as total')
            ->groupBy('date', 'role')
            ->get();

        // Siapkan data jumlah per hari berdasarkan role
        $userData = $dates->map(function ($date) use ($pengguna) {
            return (int) $pengguna->where('date', $date)->where('role', 'user')->sum('total');
        });

        $adminData = $dates->map(function ($date) use ($pengguna) {
            return (int) $pengguna->where('date', $date)->where('role', 'admin')->sum('total');
        });

        // Kirim data ke tampilan
        return view('Grafik.index', [
            'dates' => $dates,
            'userData' => $userData,
            'adminData' => $adminData,
        ]);
    }
}
