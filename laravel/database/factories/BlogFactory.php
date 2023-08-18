<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
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
            'title' => $this->faker->words(rand(1,2), true),
            'img' => $this->faker->imageUrl(270,300, null,true),
            'preview' => $this->faker->imageUrl(270,300, null,true),
        ];
    }
}
