<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    // Les colonnes modifiables
    protected $fillable = ['name', 'description', 'start_date', 'end_date'];

    public function challenges()
    {
        return $this->hasMany(Challenge::class);
    }
}

