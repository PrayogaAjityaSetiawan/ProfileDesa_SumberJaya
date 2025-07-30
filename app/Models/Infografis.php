<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infografis extends Model
{
    protected $fillable = [
        'nama',
        'jumlah_penduduk',
        'jumlah_kk',
        'jumlah_rt',
        'jumlah_rw',
        'jumlah_laki_laki',
        'jumlah_perempuan',
        'kelompok_umur',
        'tingkat_pendidikan',
        'agama_penduduk',
        'jenis_pekerjaan',
    ];

    protected $casts = [
        'kelompok_umur' => 'array',
        'tingkat_pendidikan' => 'array',
        'agama_penduduk' => 'array',
        'jenis_pekerjaan' => 'array',
    ];
}
