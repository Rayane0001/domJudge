<?php

namespace App\Repositories;

use App\Models\Competition;

interface ICompetitionRepository
{
    public function all();
    public function find($id);
}
