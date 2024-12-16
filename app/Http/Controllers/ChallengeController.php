<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Competition;

class ChallengeController extends Controller
{
    public function show(Competition $competition, Challenge $challenge)
    {
        return view('competitions.challenges.show', compact('competition', 'challenge'));
    }
}
