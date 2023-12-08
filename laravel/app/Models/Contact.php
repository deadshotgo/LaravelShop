<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'address',
        'gmail',
        'phone_number',
        'footer_text',
        'is_active'
    ];

}
