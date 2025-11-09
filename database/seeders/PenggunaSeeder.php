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
        
        Pengguna::create([
            'name' => 'Pengguna WisataKu',
            'email' => 'Pengguna1@wisataku.com',
            'password' => Hash::make('Password123'),
            
        ]);

        
        Pengguna::create([
            'name' => 'Administrator WisataKu',
            'email' => 'admin@wisataku.com',
            'password' => Hash::make('admin123'),
        
        ]);
    }
}