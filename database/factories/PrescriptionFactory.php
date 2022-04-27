<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'medicine' => $this->faker->sentence(3, true),
            'presentation' => $this->faker->sentence(1, true),
            'quantity' => $this->faker->randomElement(['3', '5', '8', '10', '15', '20']),
            'indication' => $this->faker->sentence(4, true),
            'observations' => $this->faker->sentence(5, true),
        ];
    }
}
