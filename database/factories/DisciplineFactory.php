<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DisciplineFactory extends Factory
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
            'name'=> fake()->name(),
            'description'=> fake()->paragraph(),
            'bimonthly'=> fake()->randomElement([1,2,3,4]),
            'teacher_id'=> User::where('role_id', $role->id)->first()->id //?? User::factory()->create(['role' => 'teacher'])->id,
        ];
    }
}
