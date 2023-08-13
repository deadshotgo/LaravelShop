<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id'); // Связь к модели Blog через внешний ключ blog_id
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Связь к модели User через внешний ключ user_id
    }
}
