<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedCompetitionsTable extends Seeder
{
    public function run()
    {
        DB::table('competitions')->insert([
            [
                'name' => 'Compétition Test',
                'description' => 'Compétition fictive pour tester le site.',
                'start_date' => now(),
                'end_date' => now()->addDays(7),
                'created_at' => nw(),
                'updated_at' => now(),
            ],
        ]);
    }
}
