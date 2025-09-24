<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Administrator;
use App\Models\Pengguna;
use App\Models\Wisata;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // --- Buat User Admin (untuk login Laravel default auth) ---
        User::updateOrCreate(
            ['email' => 'admin@wisataku.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // --- Buat Administrator ---
        $administrator = Administrator::updateOrCreate(
            ['email' => 'administrator@wisataku.com'],
            [
                'name' => 'Administrator Utama',
                'password' => Hash::make('admin123'),
            ]
        );

        // --- Buat Pengguna ---
        Pengguna::updateOrCreate(
            ['email' => 'pengguna1@wisataku.com'],
            [
                'name' => 'Pengguna Pertama',
                'password' => Hash::make('pengguna123'),
                'administrator_id' => $administrator->id,
            ]
        );

        Pengguna::updateOrCreate(
            ['email' => 'pengguna2@wisataku.com'],
            [
                'name' => 'Pengguna Kedua',
                'password' => Hash::make('pengguna123'),
                'administrator_id' => $administrator->id,
            ]
        );

        // --- Buat beberapa data Wisata (dengan foto) ---
        $wisata = [
            [
                'nama' => 'Hutan Hijau',
                'lokasi' => 'Kalimantan',
                'deskripsi' => 'Hutan tropis yang lebat dan asri.',
                'foto' => 'default/opo1.jpg',
            ],
            [
                'nama' => 'Danau Salju',
                'lokasi' => 'Papua Pegunungan',
                'deskripsi' => 'Danau indah yang dikelilingi salju abadi.',
                'foto' => 'default/opo2.jpg',
            ],
            [
                'nama' => 'Gunung & Danau',
                'lokasi' => 'Sumatera Utara',
                'deskripsi' => 'Pemandangan gunung menjulang dan danau biru.',
                'foto' => 'default/opo3.jpg',
            ],
        ];

        foreach ($wisata as $item) {
            Wisata::updateOrCreate(
                ['nama' => $item['nama']],
                $item
            );
        }
    }
}
