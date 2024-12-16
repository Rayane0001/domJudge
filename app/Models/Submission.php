<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'challenge_id',
        'submission_time',
        'is_correct',
        'penalty_time'
    ];

    // Définir la relation avec l'équipe
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Définir la relation avec le challenge
    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }
}
