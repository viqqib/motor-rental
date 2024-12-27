<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteInfo extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'website_info';

    // The attributes that are mass assignable
    protected $fillable = [
        'name',
        'tagline',
        'email',
        'phone_number',
        'address',
        'description',
    ];

    // If you need to specify any dates for date/time attributes, you can add them here.
    // protected $dates = ['created_at', 'updated_at'];
}
