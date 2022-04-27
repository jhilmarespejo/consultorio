<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $total = $this->faker->numberBetween(100, 200);
        $toCount = $this->faker->numberBetween(10, 100);
        return [
            'total' => $total,
            'onaccount' => $toCount,
            'credit' => $total - $toCount,
            'date' => $this->faker->dateTimeBetween('-1 years'),
            'observations' => $this->faker->sentence(4, false),
        ];
    }
}
