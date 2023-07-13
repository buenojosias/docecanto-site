<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lowest_note_id = $this->faker->randomElement([null, rand(1, 10)]);
        if ($lowest_note_id) {
            $highest_note_id = rand($lowest_note_id + 5, 30);
        } else {
            $highest_note_id = null;
        }
        return [
            'height' => $this->faker->randomElement([null, rand(140, 170)]),
            'tuning' => $this->faker->randomElement([null, rand(1, 5)]),
            'vocal_power' => $this->faker->randomElement([null, rand(1, 5)]),
            'lowest_note_id' => $lowest_note_id,
            'highest_note_id' => $highest_note_id,
        ];
    }
}
