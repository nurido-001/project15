<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Relasi: 1 Administrator memiliki banyak Pengguna
     */
    public function penggunas()
    {
        return $this->hasMany(Pengguna::class);
    }

    /**
     * Relasi: 1 Administrator memiliki banyak GrafikPengguna
     */
    public function grafikPenggunas()
    {
        return $this->hasMany(GrafikPengguna::class);
    }
}
