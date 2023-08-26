<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use function MongoDB\BSON\toRelaxedExtendedJSON;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = Category::query()->inRandomOrder()->value('id');
        return [
            'title' => $this->faker->words(rand(1,2), true),
            'description' => $this->faker->realText(),
            'information' => $this->faker->realText(),
            'feature' => $this->faker->boolean(10),
            'qty' => rand(0, 1000),
            'price' => rand(0, 1000),
            'article' => rand(1000,879383),
            'is_active' => true,
            'category_id' => $category,
            'sub_category_id' => SubCategory::query()->inRandomOrder()->where('category_id',$category)->value('id'),
            'brand_id' => Brand::query()->inRandomOrder()->value('id'),
        ];
    }
}
