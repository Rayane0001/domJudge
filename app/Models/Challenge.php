<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    // Définir la relation avec les soumissions
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
