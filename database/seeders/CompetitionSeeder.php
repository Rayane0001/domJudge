<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('competitions')->insert([
            [
                'name' => 'Compétition Test',
                'description' => 'Compétition fictive pour tester le site.',
                'start_date' => now(),
                'end_date' => now()->addDays(7),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
