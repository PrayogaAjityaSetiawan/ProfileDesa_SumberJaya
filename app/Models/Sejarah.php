<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];
}
