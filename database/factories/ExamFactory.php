<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Discipline;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'exame_date' => fake()->date(),
            'max_grade' => fake()->numberBetween(0, 10),
            'max_score' => fake()->numberBetween(0, 20),
            'link' => fake()->url(),
            'discipline_id' => Discipline::inRandomOrder()->first()->id
        ];
    }
}
