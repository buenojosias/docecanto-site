<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => rand(1, 100),
            'title' => $this->faker->realText(24),
            'resume' => $this->faker->realText(200),
            'lyrics' => $this->faker->realText(1000),
            'fulltext' => 'blablabla',
            'detached' => false,
        ];
    }
}
