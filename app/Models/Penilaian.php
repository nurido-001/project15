<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = ['rating', 'komentar', 'pengguna_id', 'tempat_wisata_id'];

    // Penilaian diberikan oleh pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    // Penilaian untuk tempat wisata
    public function tempatWisata()
    {
        return $this->belongsTo(TempatWisata::class);
    }
}