<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Jalankan seeder database.
     */
    public function run(): void
    {
        // Akun untuk pengguna biasa
        Pengguna::create([
            'name' => 'Pengguna WisataKu',
            'email' => 'Pengguna@wisataku.com',
            'password' => Hash::make('password123'),
            'role' => 'pengguna', // pastikan kolom 'role' ada di tabel
        ]);

        // Akun untuk admin
        Pengguna::create([
            'name' => 'Administrator WisataKu',
            'email' => 'admin@wisataku.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
