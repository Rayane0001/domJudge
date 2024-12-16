<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function show($competitionId, $challengeId)
    {
        $competition = Competition::findOrFail($competitionId);
        $challenge = Challenge::findOrFail($challengeId);

        return view('competitions.challenges.show', compact('competition', 'challenge'));
    }
}
