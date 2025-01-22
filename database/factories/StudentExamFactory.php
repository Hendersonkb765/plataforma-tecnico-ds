<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => User::inRandomOrder()->where('role_id', 1)->first()->id,
            'exam_id' => Exam::inRandomOrder()->first()->id,
            'grades' => fake()->randomFloat(2, 0, 10),
            'score' => fake()->numberBetween(0, 20),
            'attachment' => fake()->sentence()
            
        ];
    }
}
