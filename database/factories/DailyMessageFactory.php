<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyMessage>
 */
class DailyMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day' => $this->faker->numberBetween(1, 28),
            'month' => $this->faker->numberBetween(1, 12),
            'message' => $this->faker->text(100),
        ];
    }
}
