<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Competition;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(Request $request, Competition $competition, Challenge $challenge)
    {
        // Validation de la soumission
        $request->validate([
            'solution_file' => 'required|file|mimes:zip,rar,pdf', // Formats de fichier acceptés
        ]);

        // Créer une soumission
        $submission = new Submission();
        $submission->team_id = auth()->user()->team_id; // Récupérer l'ID de l'équipe de l'utilisateur
        $submission->competition_id = $competition->id;
        $submission->challenge_id = $challenge->id;
        $submission->submission_date = now(); // Date actuelle pour la soumission
        $submission->solution_file = $submission->uploadSolution($request->file('solution_file')); // Stockage du fichier
        $submission->result = 'pending'; // Initialement en attente
        $submission->save();

        return redirect()->route('competitions.challenges.show', [$competition->id, $challenge->id])
            ->with('message', 'Soumission réussie!');
    }
}
