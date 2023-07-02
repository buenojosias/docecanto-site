<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kin>
 */
class KinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName().' '.$this->faker->lastName().' '.$this->faker->lastName(),
            'birth' => $this->faker->randomElement([null, $this->faker->dateTimeBetween('-50 years', '30 years')]),
            'profession' => $this->faker->randomElement([null, 'Diarista', 'Vendedor', 'Empresário']),
        ];
    }
}
