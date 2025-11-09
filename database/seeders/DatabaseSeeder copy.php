<?php
/*
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrator;
use App\Models\Pengguna;
use App\Models\Wisata;

class DatabaseSeeder extends Seeder
{
    /**
   
     
    public function run(): void
    {
        
        $this->call([
        ]);

        
        Pengguna::updateOrCreate(
            ['email' => 'Admin@wisataku.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123456789'),
               
            ]
        );

        $administrator = Administrator::updateOrCreate(
            ['email' => 'administrator@wisataku.com'],
            [
                'name' => 'Administrator Utama',
                'password' => Hash::make('admin123'),
            ]
        );

     
        Pengguna::updateOrCreate(
            ['email' => 'Pengguna1@wisataku.com'],
            [
                'name' => 'Pengguna Pertama',
                'password' => Hash::make('Pengguna123'),
                'administrator_id' => $administrator->id,
            ]
        );

        Pengguna::updateOrCreate(
            ['email' => 'Pengguna2@wisataku.com'],
            [
                'name' => 'Pengguna Kedua',
                'password' => Hash::make('12345678'),
                'administrator_id' => $administrator->id,
            ]
        ); 
        
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

*/