<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageContent extends Model
{
    use HasFactory;

    protected $table = 'homepage_contents'; // Specify the table name if it differs from the plural form of the model

    // Define the fillable attributes to allow mass assignment
    protected $fillable = [
        'section',
        'heading',
        'content',
        'image',
    ];
}
