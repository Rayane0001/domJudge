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
            'answer' => 'required|string',
        ]);

        // Créer une soumission
        $submission = new Submission();
        $submission->user_id = auth()->id();
        $submission->challenge_id = $challenge->id;
        $submission->competition_id = $competition->id;
        $submission->answer = $request->answer;
        $submission->status = 'pending';  // Initialement en attente
        $submission->save();

        return redirect()->route('competitions.challenges.show', [$competition->id, $challenge->id])
            ->with('message', 'Soumission réussie!');
    }
}
