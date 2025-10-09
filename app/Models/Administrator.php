<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrator extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Kolom yang disembunyikan saat model dikonversi ke array/JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Kolom yang dikonversi ke tipe data tertentu.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relasi: Administrator memiliki banyak Pengguna.
     */
    public function penggunas()
    {
        return $this->hasMany(Pengguna::class, 'admin_id');
    }

    /**
     * Relasi: Administrator memiliki banyak entri grafik pengguna.
     */
    public function grafikPenggunas()
    {
        return $this->hasMany(GrafikPengguna::class, 'admin_id');
    }
}
