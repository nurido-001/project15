<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $fillable = ['name', 'email', 'password'];

    // Setiap pengguna dimiliki oleh 1 administrator
    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }

    // 1 pengguna bisa melakukan banyak pencarian
    public function pencarian()
    {
        return $this->hasMany(Pencarian::class);
    }

    // 1 pengguna bisa memberikan banyak penilaian
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}