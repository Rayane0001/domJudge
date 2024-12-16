<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscussionThread extends Model
{

    // Define the attributes that are mass assignable
    protected $fillable = [
        'name',
        'title',
        'date_creation',
    ];

    // Casts the attributes to their respective data types
    protected $casts = [
        'name' => 'string',
        'title' => 'String',
        'date_creation' => 'datetime',

    ];

    /**
     * Define the relationship between a Challenge and its Competition.
     * Chaque challenge appartient à une compétition.
     */
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
