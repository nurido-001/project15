<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $admin = User::where('email', 'admin@wisataku.com')->first();

        if (!$admin) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@wisataku.com',
                'password' => Hash::make('12345678'), // password bcrypt
                'role' => 'admin', // opsional kalau tabel user ada kolom role
            ]);
        }
    }
}
