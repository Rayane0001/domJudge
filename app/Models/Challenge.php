<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Challenge
{
    use HasFactory;

    /*
     * The attributes that are mass assignable.
     */
    protected $fillable = ["nom", "difficulté", "énoncé", "visuel", "la liste des tests"];

    protected $casts = [
        'nom' => 'string',
        'difficulté' => 'ingteger',
        'énoncé' => 'string',
        'visuel' => 'string',
        'temps_preparation' => 'integer',
        'nb_personnes' => 'integer',
        'cout' => 'integer'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ingredients() {
        return $this->belongsToMany(Ingredient::class, 'compose')
            ->as('ingredients')
            ->withPivot('quantite', 'observation');
    }
}
