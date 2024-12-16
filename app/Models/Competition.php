<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    public function challenges()
    {
        return $this->hasMany(Challenge::class);  // Une compétition a plusieurs challenges
    }

    public function submissions()
    {
        return $this->hasManyThrough(Submission::class, Challenge::class);
    }
}
