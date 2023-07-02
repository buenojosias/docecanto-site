<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
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
            'birth' => $this->faker->dateTimeBetween('-16 years', '-8 years'),
            'registration_date' => $this->faker->randomElement([null, $this->faker->dateTimeBetween('-4 months', '-2 days')]),
            'status' => 'Ativo',
        ];
    }
}
