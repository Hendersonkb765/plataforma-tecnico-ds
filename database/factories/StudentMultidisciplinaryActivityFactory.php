<?php

namespace Database\Factories;

use App\Models\MultidisciplinaryActivity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentMultidisciplinaryActivity>
 */
class StudentMultidisciplinaryActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => User::inRandomOrder()->where('role_id',1)->first()->id,
            'multidisciplinary_activity_id' => MultidisciplinaryActivity::inRandomOrder()->first()->id,
            'grade' => fake()->numberBetween(0, 10),
            'score' => fake()->numberBetween(0, 10),
            'attachment' => fake()->word(),
        ];
    }
}
