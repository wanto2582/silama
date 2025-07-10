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
        Schema::create('peraturan_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tahun')->nullable();
            $table->string('nama_kades')->nullable();
            $table->string('perihal')->nullable();
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peraturan_desa');
    }
};
