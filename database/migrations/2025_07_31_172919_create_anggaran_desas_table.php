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
        Schema::create('anggaran_desas', function (Blueprint $table) {
            $table->id();
            $table->year('tahun')->unique();
            $table->json('pendapatan')->nullable(); // array of { sumber, jumlah }
            $table->json('belanja')->nullable();    // array of { sumber, jumlah }
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggaran_desas');
    }
};
