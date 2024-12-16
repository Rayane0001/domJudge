<?php

namespace App\Repositories;

use App\Models\Competition;
use Illuminate\Database\Eloquent\Collection;

class CompetitionRepository implements ICompetitionRepository
{

    public function all(string $cat = 'All', float $cout = 0.0, int $temps = 0): Collection
    {
        return Competition::all();
    }
}
