<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(36),
            'local' => $this->faker->text(36),
            'date' => $this->faker->dateTimeBetween('-2 weeks', '+4 weeks'),
            'time' => $this->faker->time('H:i:s'),
            'description' => $this->faker->realText(),
            'is_presentation' => $this->faker->boolean()
        ];
    }
}
