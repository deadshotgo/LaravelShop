<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'brand',
        'description',
        'information',
        'qty',
        'price',
        'article',
        'is_active',
        'category_id',
        'sub_category_id',
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
        return $this->belongsToMany(Color::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
