<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'image',
        'author',
        'content',
        'status',
        'slug',
        'category_id',
    ];
}
