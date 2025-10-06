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
     * Relasi: satu wisata bisa punya banyak penilaian (review)
     */
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'wisata_id');
    }
}
