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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();

            // relasi ke tabel pengguna
            $table->unsignedBigInteger('pengguna_id');
            $table->foreign('pengguna_id')
                  ->references('id')
                  ->on('penggunas') // pastikan nama tabel sesuai di database kamu
                  ->onDelete('cascade');

            // relasi ke tabel tempat_wisata
            $table->unsignedBigInteger('tempat_wisata_id');
            $table->foreign('tempat_wisata_id')
                  ->references('id')
                  ->on('tempat_wisatas') // pastikan nama tabel sesuai di database kamu
                  ->onDelete('cascade');

            // kolom rating (1–5)
            $table->unsignedTinyInteger('rating'); 

            // kolom komentar
            $table->text('komentar')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
