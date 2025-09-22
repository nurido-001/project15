<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminste\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
// DatabaseSeeder.php
public function run(): void
{
    // Buat user dummy
    User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin@wisataku.com',
        'role' => 'admin',
    ]);

    User::factory()->create([
        'name' => 'Pengguna',
        'email' => 'Pengguna@wisataku.com',
        'role' => 'Pengguna',
    ]);
  
    
}

}
