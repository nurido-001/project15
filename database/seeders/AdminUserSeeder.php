<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{

    public function run(): void
    {
        $Administrators = Administrator::where('email', 'admin3@wisataku.com')->first();
        if (!$Administrators) {
            Administrator::create([
                'name' => 'Admin WisataKu',
                 'email' => 'admin3@wisataku.com',
                'password' => Hash::make('87654321'),
            ]);
        }
        
    }
}
