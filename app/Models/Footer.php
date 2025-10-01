<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'address', 'email', 'phone',
        'website', 'facebook', 'twitter', 'instagram', 'linkedin'
    ];
    
}
