<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pencarian extends Model
{
    protected $fillable = ['keyword', 'pengguna_id'];

    // 1 pencarian dilakukan oleh 1 pengguna
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }
}