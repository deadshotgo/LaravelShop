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
        return [
            'path' => $this->faker->word(),
            'address' => $this->faker->address(),
            'gmail' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'footer_text' => $this->faker->word(),
            'is_active' => true,
        ];
    }
}
