<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activity;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImageActivity>
 */
class ImageActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activity_id' => Activity::inRandomOrder()->first()->id,
            'url' => fake()->imageUrl(),
            'title' => fake()->title()
        ];
    }
}
