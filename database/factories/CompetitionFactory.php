<?php

namespace Database\Factories;

use App\Models\Competition;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompetitionFactory extends Factory
{
    protected $model = Competition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'start_registration' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'end_registration' => $this->faker->dateTimeBetween('now', '+1 month'),
            'competition_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'description' => $this->faker->paragraph(),
            'visual' => $this->faker->imageUrl(640, 480, 'sports'),
            'comp_report' => $this->faker->word() . '.md',
        ];
    }
}
