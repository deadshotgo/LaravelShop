<?php

namespace Database\Seeders;

use App\Models\Blogs;
use App\Models\Blog;
use App\Models\BlogsTags;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\TagBlog;
use App\Models\TagProduct;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Tags;
use App\Models\Comment;
use App\Models\BlogTags;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Category::factory(7)->has(SubCategory::factory(5))->create();
        Color::factory(10)->create();
        Tag::factory(8)->create();
        Brand::factory(10)->create();
        Product::factory(69)->has(ImageProduct::factory(5))->create();
        TagProduct::factory(6)->create();
        ColorProduct::factory(76)->create();
        Blog::factory(10)->create();
        Comment::factory(10)->create();
        TagBlog::factory(3)->create();
    }
}
