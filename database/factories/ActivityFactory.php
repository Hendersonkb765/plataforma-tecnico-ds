<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Discipline;
use App\Models\Role;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = Role::where('name', 'teacher')->first();
        return [
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'expiration_date' => fake()->date(),
            'max_grade' => fake()->numberBetween(0, 10),
            'max_score' => fake()->numberBetween(0, 20),
            'link' => fake()->url(),
            'discipline_id' => Discipline::inRandomOrder()->first()->id,
            'teacher_id' => User::inRandomOrder()->where('role_id', $role->id)->first()->id
    
        ];
    }

}
