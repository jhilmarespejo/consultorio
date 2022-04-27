<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habit>
 */
class HabitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'nutrition' => $this->faker->sentence(5, false),
        'appetite' => $this->faker->sentence(4, false),
        'gut_catharsis' => $this->faker->sentence(5, false),
        'diuresis' => $this->faker->sentence(4, false),
        'sleep' => $this->faker->sentence(5, false),
        'alcohol' => $this->faker->sentence(4, false),
        'infusions' => $this->faker->sentence(5, false),
        'drugs' => $this->faker->sentence(4, false),
        'tobacco' => $this->faker->sentence(5, false),
        'observations' => $this->faker->sentence(4, false),
        ];
    }
}
