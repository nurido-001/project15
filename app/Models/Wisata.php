<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    /**
     * Kolom yang boleh diisi secara mass assignment.
     */
    protected $fillable = [
        'nama',
        'lokasi',
        'deskripsi',
        'harga_tiket',
        'foto',
        'pengguna_id', // tambahkan agar relasi pengguna tersimpan
    ];

    /**
     * Relasi: satu wisata dimiliki oleh satu pengguna (pembuat)
     */
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    /**
     * Relasi: satu wisata bisa punya banyak penilaian (review)
     */
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'wisata_id');
    }
}
