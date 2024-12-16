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
        return view('competitions', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
