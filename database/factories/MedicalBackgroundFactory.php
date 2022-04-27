<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalBackground>
 */
class MedicalBackgroundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nature' => $this->faker->sentence(2, true),
            'type' => $this->faker->sentence(2, true),
            'description' => $this->faker->sentence(3, true),
            'observations' => $this->faker->sentence(4, true),
        ];
    }
}
