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
        Schema::create('detail_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable(); // Gunakan nullable() jika kolom ini boleh kosong
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('photo')->nullable();
            $table->string('nik')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('born_place')->nullable();
            $table->date('born_date')->nullable();
            $table->string('phone_number')->nullable();
            $table->longText('address')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('ktp')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->enum('status_akun', ['Disetujui', 'Ditolak', 'Pending'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_users');
    }
};
