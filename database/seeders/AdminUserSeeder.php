<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrator;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $admin = Administrator::where('email', 'admin@wisataku.com')->first();

        if (!$admin) {
            Administrator::create([
                'name' => 'Administrator',
                'email' => 'admin@wisataku.com',
                'password' => Hash::make('12345678'), // password terenkripsi bcrypt
            ]);
        }
    }
}
