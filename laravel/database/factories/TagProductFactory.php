<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TagProduct>
 */
class TagProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::query()->inRandomOrder()->value('id'),
            'tag_id' => Tag::query()->inRandomOrder()->value('id'),
        ];
    }
}
