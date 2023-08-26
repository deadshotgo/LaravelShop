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
            'text' => $this->faker->realText(),
            'title' => $this->faker->words(rand(1,4), true),
            'preview_text' => $this->faker->realText(),
            'img' => $this->faker->imageUrl(350,362, null,true),
            'preview' => $this->faker->imageUrl(350,362, null,true),
        ];
    }
}
