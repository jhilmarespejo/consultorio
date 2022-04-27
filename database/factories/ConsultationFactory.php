<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Patient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\consultations>
 */
class ConsultationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'patient_id' => Patient::all()->random()->id,
            'motive' => $this->faker->sentence(2, true),
            'description' => $this->faker->paragraphs(1, true),
            'diagnostic' => $this->faker->paragraphs(1, true),
            'forecast' => $this->faker->paragraphs(1, true),
            'treatment' => $this->faker->paragraphs(1, true),
            'observations' => $this->faker->paragraphs(1, true),
        ];
    }
}
// paragraphs

// sentences