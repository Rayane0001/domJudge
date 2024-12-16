<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Utilise Authenticatable pour l'authentification
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /*
     * Les attributs assignables en masse.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /*
     * Les attributs masqués pour les tableaux JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
     * Les types des colonnes pour la conversion automatique.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
