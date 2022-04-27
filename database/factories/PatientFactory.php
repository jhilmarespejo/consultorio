<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       $gender = $this->faker->randomElement(['female', 'male']);
       $bloodGroup = $this->faker->randomElement(['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-']);
       $civilStatus = $this->faker->randomElement(['Soltera/o', 'Novia/o', 'Casada/o', 'Divorciada/o']);
      
        return [
            'names' => $this->faker->firstName($gender),
            'surnames' => $this->faker->lastName() . ' ' . $this->faker->lastName(),
            'sex' => strtoupper( $gender['0'] ),
            'birth_date' => $this->faker->DateTime(),
            'cellphone' => $this->faker->phoneNumber(),
            'blood_type' =>$bloodGroup,
            'cell_reference' => $this->faker->phoneNumber(),
            'civil_status' => $civilStatus,
            'mail' => $this->faker->email(),
            'home' => '"' . $this->faker->address() . '"',
            'responsible_person' => $this->faker->firstName($gender) . ' ' . $this->faker->lastName($gender),
            'responsible_person_cell' => $this->faker->phoneNumber()
        ];
    }
}
