<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrafikPengguna extends Model
{
    use HasFactory;

    protected $table = 'grafik_penggunas'; 

    protected $fillable = [
        'judul',
        'data',
        'tipe',              
        'periode',           
        'administrator_id',  
    ];

    /**
     * 
     */
    public function administrator()
    {
        return $this->belongsTo(Administrator::class);
    }
}
