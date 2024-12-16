<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competition;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        Competition::create([
            'name' => 'Compétition de Programmation 2024',
            'description' => 'Testez vos compétences en algorithmie et résolvez des problèmes complexes.',
            'start_date' => now()->addDays(1),
            'end_date' => now()->addDays(3),
        ]);

        Competition::create([
            'name' => 'Marathon de Code 2024',
            'description' => 'Un marathon de 48 heures pour les passionnés de code.',
            'start_date' => now()->addDays(10),
            'end_date' => now()->addDays(12),
        ]);
    }
}
