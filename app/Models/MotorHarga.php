<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorHarga extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'motors_harga';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_motor',
        'harga_12_jam',
        'harga_24_jam',
        'harga_1_minggu',
        'harga_1_bulan',
    ];

    /**
     * Relationship with the Motor model.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor');        
    }
    public function motorHarga()
{
    return $this->hasOne(MotorHarga::class, 'id_motor');
}
}
