<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts'; // <-- set to your actual table name
    protected $fillable = ['name', 'email', 'phone', 'project', 'subject', 'message'];
    public $timestamps = true; // set false if your table has no created_at/updated_at
}
