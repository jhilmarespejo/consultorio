<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Consultation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VitalSign>
 */
class VitalSignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //'consultation_id' => Consultation::all()->random()->id,
            'weight' => $this->faker->randomElement(['72000', '62000', '55000', '82300', '91200', '67500']),
            'size'=> $this->faker->randomElement(['156', '176', '181', '167', '159', '166']),
            'heart_rate' => $this->faker->bothify(),
            'respiratory_rate' => $this->faker->bothify(),
            'arterial_pressure' => $this->faker->bothify(),
            'observations' => $this->faker->paragraphs(1, true),

        ];
    }
}
