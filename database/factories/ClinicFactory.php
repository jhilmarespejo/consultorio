<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\clinics>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'logo' => '',
            'appointment_interval' => $this->faker->randomElement(['40', '30']),
            'clinic' => $this->faker->company(),
            'direction' => "'" . $this->faker->address(),
            'responsable' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'cellphone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'nit' => $this->faker->numerify('######-##'),
            'registry' => $this->faker->numerify('#-##-##-#'),
            'Schedule' => $this->faker->randomElement(['Lunes a Viernes de 8:00 a 16:00', 'Lunes a Viernes de 9:00 a 14:00'])
        ];
    }
}
