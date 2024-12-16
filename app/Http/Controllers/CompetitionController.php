<?php

namespace App\Http\Controllers;

use App\Models\Competition;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Competition::all();  // Récupérer toutes les compétitions
        return view('competitions.index', compact('competitions'));
    }

    public function show(Competition $competition)
    {
        // Charger les équipes associées à la compétition
        $teams = $competition->teams;
        return view('competitions.show', compact('competition', 'teams'));
    }
}

