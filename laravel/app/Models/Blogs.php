<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'img', 'preview'];

    public function comments() {
        return $this->hasMany(Comments::class, 'blog_id'); // Связь к модели Comment через внешний ключ blog_id
    }
}
