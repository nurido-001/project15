<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GrafikController extends Controller
{
    public function index()
    {
        // Ambil rentang waktu 30 hari terakhir
        $startDate = Carbon::now()->subDays(29);
        $endDate = Carbon::now();

        // Siapkan array tanggal 30 hari ke belakang
        $dates = collect();
        for ($i = 0; $i < 30; $i++) {
            $dates->push($startDate->copy()->addDays($i)->format('Y-m-d'));
        }

        // Ambil data pengguna (role: 'user') per hari
        $penggunaData = $dates->map(function ($date) {
            return User::whereDate('created_at', $date)
                ->where('role', 'user')
                ->count();
        });

        // Ambil data admin (role: 'admin') per hari
        $adminData = $dates->map(function ($date) {
            return User::whereDate('created_at', $date)
                ->where('role', 'admin')
                ->count();
        });

        return view('Admin.grafik', [
            'dates' => $dates,
            'penggunaData' => $penggunaData,
            'adminData' => $adminData,
        ]);
    }
}
