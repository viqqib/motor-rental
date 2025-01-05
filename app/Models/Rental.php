<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_motor',
        'id_renter',
        'durasi_sewa',
        'tgl_mulai',
        'tgl_selesai',
        'total_harga',
        'status',
    ];

    // Relationship with Motor
    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor');
    }

    // Relationship with Renter
    public function renter()
    {
        return $this->belongsTo(Renter::class, 'id_renter');
    }
}
