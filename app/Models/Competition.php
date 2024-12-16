<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',
        'start_registration',
        'end_registration',
        'competition_date',
        'description',
        'visual',
        'comp_report',
    ];

    // Casts the attributes to their respective data types
    protected $casts = [
        'name' => 'string',
        'start_registration' => 'datetime',
        'end_registration' => 'datetime',
        'competition_date' => 'datetime',
        'description' => 'string',
        'visual' => 'string',
        'comp_report' => 'string',
    ];

    // Relationships
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
