<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $fillable = ['name', 'email', 'password'];

    // 1 Administrator mengelola banyak Pengguna
    public function pengguna()
    {
        return $this->hasMany(Pengguna::class);
    }

    // 1 Administrator menghasilkan banyak GrafikPengguna
    public function grafik()
    {
        return $this->hasMany(GrafikPengguna::class);
    }
}