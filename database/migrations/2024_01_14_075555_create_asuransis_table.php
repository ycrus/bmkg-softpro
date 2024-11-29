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
        Schema::create('asuransis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('perusahaan');
            $table->string('tanggal');
            $table->string('lokasi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('kejadian');
            $table->string('status')->default('Menunggu');
            $table->string('surat_permohonan')->nullable();
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
