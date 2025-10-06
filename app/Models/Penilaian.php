<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'komentar',
        'pengguna_id',
        'wisata_id', // ✅ diganti dari tempat_wisata_id
    ];

    /**
     * Relasi: review diberikan oleh pengguna
     */
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    /**
     * Relasi: review untuk wisata
     */
    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }
}
