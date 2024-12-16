<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Test::create([
            'title' => 'Test Laravel',
            'description' => 'Description de test Laravel',
        ]);

        Test::create([
            'title' => 'Test PHP',
            'description' => 'Description de test PHP',
        ]);
    }
}
