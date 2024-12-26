<?php
// app/Models/Motor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    // If your table name is not the plural form of the model name, you can specify it here
    protected $table = 'motors';

    // Specify the columns you want to be mass assignable (for example, if you want to fill these columns using create or update)
    protected $fillable = [
        'nomor_plat','tipe', 'merek','tahun', 'warna', 'status', 'gambar' 
    ];
    public function motorHarga()
    {
        return $this->hasOne(MotorHarga::class, 'id_motor');
    }
}
