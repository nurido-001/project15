<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaians'; // ✅ pastikan tabelnya benar

    protected $fillable = [
        'wisata_id',     // ID wisata yang dinilai
        'pengguna_id',   // ID pengguna yang memberi penilaian
        'rating',        // nilai rating
        'komentar',      // teks komentar
    ];

    /**
     * Relasi: Penilaian ini diberikan oleh seorang pengguna
     */
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    /**
     * Relasi: Penilaian ini untuk sebuah tempat wisata
     */
    public function wisata()
    {
        return $this->belongsTo(Wisata::class, 'wisata_id');
    }
}
