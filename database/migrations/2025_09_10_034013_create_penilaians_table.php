<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();

            // 🔗 Relasi ke tabel pengguna
            $table->unsignedBigInteger('pengguna_id');
            $table->foreign('pengguna_id')
                  ->references('id')
                  ->on('penggunas') // pastikan nama tabel pengguna kamu benar
                  ->onDelete('cascade');

            // 🔗 Relasi ke tabel wisata (bukan tempat_wisata lagi)
            $table->unsignedBigInteger('wisata_id');
            $table->foreign('wisata_id')
                  ->references('id')
                  ->on('wisatas') // sesuaikan dengan nama tabel dari model Wisata
                  ->onDelete('cascade');

            // ⭐ Kolom rating (1–5)
            $table->unsignedTinyInteger('rating')
                  ->comment('Nilai rating antara 1 sampai 5');

            // 💬 Kolom komentar (opsional)
            $table->text('komentar')->nullable();

            // ⏰ Timestamps
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
