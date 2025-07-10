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
        Schema::create('detail_surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedBigInteger('pengajuan_surat_id')->nullable();
            $table->foreign('pengajuan_surat_id')->references('id')->on('pengajuan_surats')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('nkk')->nullable();
            $table->enum('gender', ['Laki - Laki', 'Perempuan'])->nullable();
            $table->enum('agama', ['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghucu'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->enum('status_pernikahan', ['Belum Menikah', 'Menikah', 'Pernah Menikah'])->nullable();
            $table->longText('alamat')->nullable();
            $table->string('ketua')->nullable();
            $table->string('bin')->nullable();
            $table->date('tanggal_meninggal')->nullable();
            $table->time('jam_meninggal')->nullable();
            $table->string('tempat_meninggal')->nullable();
            $table->string('sebab_meninggal')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('semester')->nullable();
            $table->date('mulai_usaha')->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('alasan_pindah')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('jenis_surat')->nullable();
            $table->string('kode_surat')->nullable();
            $table->string('berkas')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_surats');
    }
};
