<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cohort;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CohortFactory extends Factory
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
            'year'=> fake()->date('yyyy')
        ];
    }

    public function configure(){

        return $this->afterCreating(function (Cohort $cohort){
            $cohort->discipline()->attach(Cohort::inRandomOrder()->first());
            $cohort->save();
        });
    }
}
