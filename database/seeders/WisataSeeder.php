<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wisata;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wisata::create([
            'nama' => 'Pantai Indah',
            'lokasi' => 'Bali',
            'deskripsi' => 'Pantai dengan pasir putih dan sunset yang indah.',
            'harga_tiket' => 25000,
            'foto' => null, // biar otomatis fallback ke default/opo.jpg
        ]);

        Wisata::create([
            'nama' => 'Gunung Sejuk',
            'lokasi' => 'Bandung',
            'deskripsi' => 'Gunung dengan udara sejuk dan pemandangan hijau.',
            'harga_tiket' => 50000,
            'foto' => null,
        ]);

        Wisata::create([
            'nama' => 'Air Terjun Asri',
            'lokasi' => 'Yogyakarta',
            'deskripsi' => 'Air terjun alami dengan suasana tenang.',
            'harga_tiket' => 15000,
            'foto' => null,
        ]);
    }
}
