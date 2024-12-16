<?php

namespace App\Http\Controllers;

use App\Models\Competition;

class CompetitionController extends Controller
{
    // Afficher toutes les compétitions
    public function index()
    {
        $competitions = Competition::all();  // Récupérer toutes les compétitions
        return view('competitions.index', compact('competitions'));
    }

    // Afficher les détails d'une compétition spécifique
    public function show(Competition $competition)
    {
        return view('competitions.show', compact('competition'));
    }
}
