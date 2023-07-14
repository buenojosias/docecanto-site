<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Queue>
 */
class QueueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement([null, rand(1, 6)]),
            'child_name' => $this->faker->firstName().' '.$this->faker->lastName().' '.$this->faker->lastName(),
            'child_phone' => $this->faker->randomElement([null, $this->faker->phoneNumber()]),
            'parent_name' => $this->faker->firstName().' '.$this->faker->lastName().' '.$this->faker->lastName(),
            'parent_phone' => $this->faker->randomElement([null, $this->faker->phoneNumber()]),
            'age' => rand(7, 12),
            'church' => $this->faker->randomElement([null, 'São Marcos', 'Beato', 'Misericórdia', 'Perseverança', 'N.S. Aparecida']),
            'status' => $this->faker->randomElement(['Pendente', 'Visualizado', 'Contactado', 'Participando', 'Desistiu']),
        ];
    }
}
