<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'id_motor',
        'email',
        'review',
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'id_motor');        
    }

    // Define relationships if necessary
    // For example, if a review belongs to a product:
    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
