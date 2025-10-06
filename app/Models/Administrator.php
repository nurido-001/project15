<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
    
     */
    public function penggunas()
    {
        return $this->hasMany(Pengguna::class);
    }

    /**
     */
    public function grafikPenggunas()
    {
        return $this->hasMany(GrafikPengguna::class);
    }
}
