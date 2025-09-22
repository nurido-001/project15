<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    // nama tabel (opsional, kalau tidak sama dengan jamak dari nama model)
    protected $table = 'wisatas';

    // kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'foto',
    ];
}
  