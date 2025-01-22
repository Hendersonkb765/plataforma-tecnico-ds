<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MultidisciplinaryActivity>
 */
class MultidisciplinaryActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'description'=> fake()->sentence(),
            'delivery_date'=> fake()->date(),
            'max_grade'=> fake()->numberBetween(0, 10),
            'max_score'=> fake()->numberBetween(0, 20),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (\App\Models\MultidisciplinaryActivity $multidisciplinaryActivity) {
            $multidisciplinaryActivity->cohorts()->attach(\App\Models\Cohort::inRandomOrder()->first()->id);
        });
    }
}
