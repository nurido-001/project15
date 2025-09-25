<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    // kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'harga_tiket', // ✅ tambahkan ini
        'foto',
    ];

    // contoh relasi opsional (hapus kalau belum dipakai)
    // public function komentar()
    // {
    //     return $this->hasMany(Komentar::class);
    // }
}
