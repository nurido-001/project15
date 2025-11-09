<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        $User = User::where('email', 'User1@wisataku.com')->first();

        if (!$User) {
            User::create([
                'name' => 'Pengguna',
                'email' => 'User1@wisataku.com',
                'password' => Hash::make('12345678'), 
                
            ]);
        }
   $Administrator = User::where('email', 'admin4@wisataku.com')->first();

   if (!$Administrator) {
    User::create([
        'name' => 'Admin WisataKu',
                 'email' => 'admin4@wisataku.com',
                'password' => Hash::make('87654321'),
    ]);
   }

    }
}
