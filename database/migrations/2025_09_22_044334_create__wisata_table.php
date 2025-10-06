<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk tabel wisata.
     */
    public function up(): void
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();

            // 🏝️ Informasi utama wisata
            $table->string('nama');
            $table->string('lokasi');
            $table->text('deskripsi');

            // 💰 Harga tiket (bisa null kalau gratis)
            $table->decimal('harga_tiket', 10, 2)->nullable();

            // 🖼️ Foto utama wisata (path)
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};
