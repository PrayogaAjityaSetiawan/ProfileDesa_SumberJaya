<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $fillable = [
        'nama_paket',
        'harga',
        'gambar_paket',
        'deskripsi'
    ];
}
