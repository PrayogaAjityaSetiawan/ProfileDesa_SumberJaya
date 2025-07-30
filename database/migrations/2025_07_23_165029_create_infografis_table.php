<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('infografis', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_penduduk');
            $table->integer('jumlah_kk');
            $table->integer('jumlah_rt');
            $table->integer('jumlah_rw');
            $table->integer('jumlah_laki_laki')->nullable();
            $table->integer('jumlah_perempuan')->nullable();
            $table->json('kelompok_umur')->nullable();
            $table->json('tingkat_pendidikan')->nullable();
            $table->json('agama_penduduk')->nullable();
            $table->json('jenis_pekerjaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infografis');
    }
};
