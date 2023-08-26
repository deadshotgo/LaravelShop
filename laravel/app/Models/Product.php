<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'information',
        'feature',
        'like',
        'qty',
        'price',
        'article',
        'is_active',
        'category_id',
        'sub_category_id',
        'brand_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function imageProducts()
    {
        return $this->hasMany(ImageProduct::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_products', 'product_id', 'tag_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
