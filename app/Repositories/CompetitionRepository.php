<?php

// App/Repositories/CompetitionRepository.php
namespace App\Repositories;

use App\Models\Competition;
use Illuminate\Database\Eloquent\Collection;

class CompetitionRepository implements ICompetitionRepository
{
    public function all(): Collection
    {
        return Competition::all(); // Récupère toutes les compétitions
    }

    public function find($id)
    {
        return Competition::find($id); // Trouve une compétition par ID
    }
}
