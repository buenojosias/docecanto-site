<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $field = $this->faker->randomElement(['WhatsApp', 'E-mail', 'Instagram']);
        if ($field === 'WhatsApp') {
            $value = $this->faker->phoneNumber();
        } elseif ($field === 'E-mail') {
            $value = $this->faker->email();
        } elseif ($field === 'Instagram') {
            $value = $this->faker->userName();
        }

        return [
            'field' => $field,
            'value' => $value,
            'visible' => rand(0, 1),
        ];
    }
}
