<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk tabel pengguna.
     */
    public function up(): void
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // nama pengguna
            $table->string('email')->unique();   // email unik
            $table->string('password');          // password terenkripsi

            // 🔗 Relasi opsional ke administrator
            $table->foreignId('administrator_id')
                  ->nullable()
                  ->constrained('administrators')
                  ->onDelete('cascade');

            // 🕒 Waktu pembuatan dan pembaruan
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
