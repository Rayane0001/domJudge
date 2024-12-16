<?php

namespace App\Repositories;

use App\Models\Competition;
use App\Models\Recette;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

interface ICompetitionRepository {

    public function all(): Collection;

    /*public function find(int $id): Competition;

    public function create(array $data): Competition;

    public function update(int $id, array $data): Competition;

    public function delete(int $id): void;*/
}
