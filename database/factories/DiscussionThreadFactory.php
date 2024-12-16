<?php

namespace Database\Factories;

use App\Models\DiscussionThread;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscussionThreadFactory extends Factory
{
    protected $model = DiscussionThread::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'creation_date' => $this->faker->dateTimeThisYear(),
        ];
    }
}
