<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'no_wa',
        'link_video',
        'slug'
    ];
}
