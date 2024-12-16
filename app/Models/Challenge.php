<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'difficulte', 'enonce', 'visuel'];

    protected $casts = [
        'nom' => 'string',
        'difficulte' => 'string',
        'enonce' => 'string',
        'visuel' => 'string',
    ];

    public function tests() {
        return $this->hasMany(Test::class);
    }

    public function soumissions() {
        return $this->hasMany(Submission::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
