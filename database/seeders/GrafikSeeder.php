<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Administrator;
use App\Models\Pengguna;

class GrafikSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk data grafik (Admin & Pengguna).
     */
    public function run(): void
    {
        // 🔹 Tambahkan admin utama
        Administrator::create([
            'name' => 'Admin Utama',
            'email' => 'admin@wisataku.com',
            'password' => Hash::make('password'),
            'created_at' => Carbon::now()->subDays(rand(0, 10)),
        ]);

        // 🔹 Tambahkan beberapa admin tambahan acak
        for ($i = 1; $i <= 3; $i++) {
            Administrator::create([
                'name' => 'Admin ' . $i,
                'email' => 'admin' . $i . '@wisataku.com',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }

        // 🔹 Tambahkan beberapa pengguna dengan tanggal acak
        for ($i = 1; $i <= 20; $i++) {
            Pengguna::create([
                'name' => 'Pengguna ' . $i,
                'email' => 'pengguna' . $i . '@mail.com',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }

        // Tambahkan sedikit variasi waktu pembuatan
        for ($i = 1; $i <= 5; $i++) {
            Pengguna::create([
                'name' => 'Pengunjung Baru ' . $i,
                'email' => 'baru' . $i . '@mail.com',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->subHours(rand(1, 24)),
            ]);
        }

        $this->command->info('✅ Data dummy untuk grafik (Admin & Pengguna) berhasil dibuat!');
    }
}
