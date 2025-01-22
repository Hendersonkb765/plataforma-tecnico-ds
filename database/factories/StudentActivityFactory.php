<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Discipline;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentActivity>
 */
class StudentActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grade' => fake()->numberBetween(0, 10),
            'score'=>fake()->numberBetween(0,100),
            'attachment'=>fake()->sentence(),
            'activity_id'=>Activity::inRandomOrder()->first()->id,
            'student_id' => User::inRandomOrder()->where('role_id',1)->first()->id
        ];
    }
}
