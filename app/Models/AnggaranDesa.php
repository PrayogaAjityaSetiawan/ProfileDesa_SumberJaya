<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggaranDesa extends Model
{
    protected $fillable = ['tahun', 'pendapatan', 'belanja'];

    protected $casts = [
        'pendapatan' => 'array',
        'belanja' => 'array',
    ];
}
