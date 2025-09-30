<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Explicitly define table name
    // protected $table = 'about';

    protected $fillable = [
        'subtitle',
        'title',
        'description',
        'feature_1_icon',
        'feature_1_title',
        'feature_1_description',
        'feature_2_icon',
        'feature_2_title',
        'feature_2_description',
        'feature_3_icon',
        'feature_3_title',
        'feature_3_description',
        'phone',
        'image',
    ];
}
