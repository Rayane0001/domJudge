<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\Submission;

class SubmissionSeeder extends Seeder
{
    public function run()
    {
        $submissions = [
            // Équipe 1 soumet le problème A correctement
            ['team_id' => 1, 'challenge_id' => 1, 'submission_time' => now(), 'is_correct' => true, 'penalty_time' => 0],
            // Équipe 2 soumet le problème B avec une pénalité
            ['team_id' => 2, 'challenge_id' => 2, 'submission_time' => now()->addMinutes(10), 'is_correct' => true, 'penalty_time' => 5],
        ];

        foreach ($submissions as $submission) {
            Submission::create($submission);
        }
    }
}
