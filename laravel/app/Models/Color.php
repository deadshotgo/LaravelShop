<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    public $table = 'colors';
    protected $fillable = [
        'name',
        'color',
        'is_active',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
