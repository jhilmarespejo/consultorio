<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use App\Models\Consultation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return  [
            //'consultation_id' => 'Consultation::all()->random()->id',
            'name' => $this->faker->sentence(3, true),
            'description' => $this->faker->sentence(3, true),
            'url' => 'images/'.$this->faker->image('storage/app/public/images',640,480, null, true),
            'observations' => $this->faker->sentence(6, true),
        ];
       //print_r($s);
    }
}
