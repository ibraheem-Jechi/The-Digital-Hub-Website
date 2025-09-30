<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
    ];
}
