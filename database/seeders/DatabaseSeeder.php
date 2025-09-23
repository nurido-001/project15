<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user dummy admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@wisataku.com',
            'password' => Hash::make('password123'), // tambahkan password biar bisa login
            'role' => 'admin',
        ]);

        // Buat user dummy pengguna
        User::factory()->create([
            'name' => 'Pengguna',
            'email' => 'pengguna@wisataku.com',
            'password' => Hash::make('password123'),
            'role' => 'pengguna',
        ]);

        // Panggil WisataSeeder
        $this->call(WisataSeeder::class);
    }
}
