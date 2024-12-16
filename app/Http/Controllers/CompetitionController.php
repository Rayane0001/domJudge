<?php

namespace App\Http\Controllers;

use App\Repositories\ICompetitionRepository;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function __construct(private ICompetitionRepository $competitionRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = $this->competitionRepository->all();
        return view('home', compact('competitions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $competition = $this->competitionRepository->find($id);
        return view('competitions.show', compact('competition'));
    }
}
