<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_active',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'tag_blogs');
    }
}
