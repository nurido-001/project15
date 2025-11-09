<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Pengguna;

class GrafikSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk data grafik (hanya Pengguna).
     */
    public function run(): void
    {
        // 🔹 Tambahkan beberapa pengguna dengan tanggal acak
        for ($i = 1; $i <= 20; $i++) {
            Pengguna::create([
                'name' => 'Pengguna ' . $i,
                'email' => 'pengguna' . $i . '@mail.com',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
            ]);
        }

        // 🔹 Tambahkan pengguna baru dengan variasi waktu (jam terakhir)
        for ($i = 1; $i <= 5; $i++) {
            Pengguna::create([
                'name' => 'Pengunjung Baru ' . $i,
                'email' => 'baru' . $i . '@mail.com',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->subHours(rand(1, 24)),
            ]);
        }

        $this->command->info('✅ Data dummy untuk grafik (Pengguna) berhasil dibuat tanpa duplikasi admin!');
    }
}
