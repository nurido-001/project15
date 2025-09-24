<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi mass-assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        'administrator_id',
    ];

    /**
     * Relasi ke Administrator
     * Setiap pengguna dimiliki oleh 1 administrator
     */
    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }

    /**
     * Relasi ke Pencarian
     * 1 pengguna bisa melakukan banyak pencarian
     */
    public function pencarians()
    {
        return $this->hasMany(Pencarian::class);
    }

    /**
     * Relasi ke Penilaian
     * 1 pengguna bisa memberikan banyak penilaian
     */
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
}
