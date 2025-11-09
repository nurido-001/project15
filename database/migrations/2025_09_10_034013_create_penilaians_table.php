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

            // 🔗 Relasi ke tabel wisata (bukan tempat_wisata lagi)
            $table->unsignedBigInteger('wisata_id');

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
