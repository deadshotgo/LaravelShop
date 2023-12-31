<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;
    public $table = 'color_products';
    protected $fillable = [
        'product_id',
        'color_id',
    ];
}
