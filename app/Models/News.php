<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'slug',
        'excerpt',
        'image',
        'content',
        'published_at',
        'status',
    ];
}
