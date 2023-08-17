<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->text(30),
            'blog_id' => $this->faker->numberBetween(2, 5),
            'user_id' => $this->faker->numberBetween(2, 5),
        ];
    }
}
