<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Challenge;

class ChallengeSeeder extends Seeder
{
    public function run()
    {
        $challenges = [
            ['letter' => 'A', 'points' => 100, 'pdf_path' => 'pdfs/challenge_A.pdf', 'competition_id' => 1],
            ['letter' => 'B', 'points' => 200, 'pdf_path' => 'pdfs/challenge_B.pdf', 'competition_id' => 1],
            ['letter' => 'C', 'points' => 300, 'pdf_path' => 'pdfs/challenge_C.pdf', 'competition_id' => 1],
        ];

        foreach ($challenges as $challenge) {
            Challenge::create($challenge);
        }
    }
}
