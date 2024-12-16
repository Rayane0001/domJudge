<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    // Si nécessaire, déclare les colonnes modifiables
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
    ];
}
