<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrafikPengguna extends Model
{
    protected $fillable = ['judul', 'data', 'administrator_id'];

    // Grafik dihasilkan oleh administrator
    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }
}