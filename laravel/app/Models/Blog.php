<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'preview_text',
        'img',
        'preview',
        'like',
        'is_active',
    ];

    public function comments() {
        return $this->hasMany(Comment::class, 'blog_id'); // Связь к модели Comment через внешний ключ blog_id
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_blogs');
    }
}
