<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;
use Faker\Factory as Faker;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();


        for ($i = 0; $i < 10; $i++) {
            Test::create([
                'title' => $faker->sentence, // Un titre aléatoire
                'description' => $faker->paragraph, // Une description aléatoire
            ]);
        }
    }
}
