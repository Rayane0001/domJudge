<?php

namespace App\Repositories;

use App\Models\Competition;

class CompetitionRepository implements ICompetitionRepository
{
    public function all()
    {
        return Competition::all(); // Récupère toutes les compétitions
    }

    public function find($id)
    {
        return Competition::find($id); // Récupère une compétition par ID
    }
}
