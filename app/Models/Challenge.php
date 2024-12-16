<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    /*
     * Les attributs assignables en masse.
     */
    protected $fillable = ['nom', 'difficulte', 'enonce', 'visuel'];

    /*
     * Les types des colonnes pour la conversion automatique.
     */
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
