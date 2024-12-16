<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'challenge_id', 'status', 'time'];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);  // Une soumission est liée à un challenge
    }

    public function user()
    {
        return $this->belongsTo(User::class);  // Une soumission est faite par un utilisateur (équipe)
    }
}
