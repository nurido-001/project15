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
        Schema::create('grafik_penggunas', function (Blueprint $table) {
            $table->id();

            // Judul grafik (misal: "Aktivitas Pengguna Bulanan")
            $table->string('judul')->nullable();

            // Data dalam format JSON (misal: hasil agregasi jumlah user per hari)
            $table->json('data')->nullable();

            // Jenis grafik (misal: 'bar', 'area', 'pie', dll)
            $table->string('tipe')->default('bar');

            // Periode waktu (misal: '30 hari terakhir', 'mingguan', dll)
            $table->string('periode')->nullable();

            // ID admin pembuat grafik
            $table->foreignId('administrator_id')
                  ->nullable()
                  ->constrained('administrators')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('grafik_penggunas');
    }
};
