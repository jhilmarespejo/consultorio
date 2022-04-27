<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Consultation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
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
                'nature' => $this->faker->sentence(2, true),
                'type' => $this->faker->sentence(4, false),
                'description' => $this->faker->sentence(8, true),
                'result' => $this->faker->sentence(3, true),
                'observations' => $this->faker->paragraphs(1, true),
        ];
    }
}
