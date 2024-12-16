<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Submission;

class LeaderboardController extends Controller
{
    public function index()
    {
        $teams = Team::with(['submissions.challenge'])
            ->get()
            ->map(function ($team) {
                $team->total_score = $team->submissions
                    ->where('is_correct', true)
                    ->sum(fn($submission) => $submission->challenge->points);

                $team->total_penalty = $team->submissions
                    ->where('is_correct', true)
                    ->sum('penalty_time');

                $team->total_time = $team->submissions
                    ->where('is_correct', true)
                    ->sum(fn($submission) => strtotime($submission->submission_time) - strtotime($team->competition->start_date));

                return $team;
            })
            ->sortByDesc('total_score')
            ->values();

        return view('leaderboard', compact('teams'));
    }
}
