<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
    ];

    public function challenge(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Challenge::class); // Chaque test appartient à un challenge
    }
}
