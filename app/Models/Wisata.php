<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'harga_tiket',
        'foto',
    ];

    /**
     * Relasi: satu Wisata bisa punya banyak Penilaian (review).
     */
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'tempat_wisata_id');
    }
}
