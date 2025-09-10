<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model
{
    protected $fillable = ['nama', 'lokasi', 'deskripsi'];

    // Tempat wisata punya banyak penilaian
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}