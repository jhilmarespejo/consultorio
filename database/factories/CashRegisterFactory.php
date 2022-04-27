<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CashRegister>
 */
class CashRegisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $income = $this->faker->numberBetween(1000, 2000);
        $expenses  = $this->faker->numberBetween(100, 1000);
        return [
            'income' => $income,
            'expenses' => $expenses,
            'credit' => $income - $expenses,
            'date' => $this->faker->dateTimeBetween('-1 years'),
            'observations' => $this->faker->sentence(4, true),
        ];
    }
}
