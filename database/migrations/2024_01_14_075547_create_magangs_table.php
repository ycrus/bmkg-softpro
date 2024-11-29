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
        Schema::create('magangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('universitas');
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('tanggal_mulai');
            $table->string('tanggal_selesai');
            $table->string('status')->default('Menunggu');
            $table->string('surat_ijin_magang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magangs');
    }
};
