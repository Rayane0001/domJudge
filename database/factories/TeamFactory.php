<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Competition;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
  protected $model = Team::class;

  public function definition(): array
  {
    return [
        'nom' => $this->faker->unique()->company,
        'description' => $this->faker->paragraph,
        'visual' => $this->faker->imageUrl(640, 480, 'team', true, 'Faker'),
        'date_creation' => $this->faker->dateTimeBetween('-1 year', 'now'),
        'competition_id' => Competition::factory(),
        'coach_id' => User::factory(),
    ];
  }
}
