<?php

namespace Database\Factories;

use App\Models\Challenge;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChallengeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Challenge::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->sentence(3),
            'difficulte' => $this->faker->randomElement(['Facile', 'Moyenne', 'Difficile']),
            'enonce' => $this->faker->paragraph(),
            'visuel' => $this->faker->imageUrl(640, 480, 'challenge', true),
            'user_id' => User::factory(),
        ];
    }
}
