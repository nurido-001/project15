<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model
{
    // 👉 Tentukan nama tabel yang sesuai di database
    protected $table = 'wisatas'; // atau 'tempat_wisata', cek di database kamu

    protected $fillable = ['nama', 'lokasi', 'deskripsi'];

    // Tempat wisata punya banyak penilaian
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
