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
        $notes = \App\Models\Note::pluck('id')->toArray();
        if (empty($notes)) {
            $lowest_note_id = null;
            $highest_note_id = null;
        } else {
            $lowest_note_id = $this->faker->randomElement([null, $this->faker->randomElement($notes)]);
            if ($lowest_note_id) {
                $filtered_notes = array_filter($notes, fn ($id) => $id > $lowest_note_id);
                $highest_note_id = empty($filtered_notes) ? $lowest_note_id : $this->faker->randomElement($filtered_notes);
            } else {
                $highest_note_id = null;
            }
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
