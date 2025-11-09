<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1️⃣ Buat administrator dulu
        $this->call([
            AdminUserSeeder::class,
        ]);

        // 2️⃣ Buat user umum (tabel users)
        $this->call([
            UserSeeder::class,
        ]);

        // 3️⃣ Buat pengguna (tabel penggunas)
        $this->call([
            PenggunaSeeder::class,
        ]);

        // 4️⃣ Buat data wisata (tabel wisatas)
        $this->call([
            WisataSeeder::class,
        ]);

        // 5️⃣ Buat data grafik (kalau diperlukan)
        $this->call([
            GrafikSeeder::class,
        ]);
    }
}
