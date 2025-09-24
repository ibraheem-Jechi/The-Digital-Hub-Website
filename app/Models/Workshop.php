<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    // Table name (optional if it follows Laravel convention)
    protected $table = 'workshops';

    // Primary key (optional if it's 'id')
    protected $primaryKey = 'workshop_id';

    // Mass assignable fields
    protected $fillable = [
        'title',
        'description',
        'event_date',
        'program_id',
        'image',
    ];

    // If you want to cast event_date as a Carbon date
    protected $dates = [
        'event_date',
    ];

    // Relationship with Program (optional, when Program table exists)
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'program_id');
    }
}
