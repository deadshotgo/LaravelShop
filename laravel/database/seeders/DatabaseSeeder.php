<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\TagProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $category = Category::factory(7)->has(SubCategory::factory(5))->create();
      $color = Color::factory(10)->create();
      $tag = Tag::factory(8)->create();
      $product = Product::factory(69)->has(ImageProduct::factory(5))->create();
      $tagProduct = TagProduct::factory(61)->create();
      $colorProduct = ColorProduct::factory(76)->create();
    }
}
