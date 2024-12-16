<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    public function competition()
    {
        return $this->belongsTo(Competition::class);  // Chaque challenge appartient à une compétition
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);  // Un challenge peut avoir plusieurs soumissions
    }
}
