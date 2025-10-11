<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            // Tambahkan semua kolom yang dibutuhkan
            $table->unsignedBigInteger('pengguna_id')->nullable()->after('id');
            $table->unsignedBigInteger('wisata_id')->nullable()->after('pengguna_id');
            $table->tinyInteger('rating')->nullable();
            $table->text('komentar')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->dropColumn(['pengguna_id', 'wisata_id', 'rating', 'komentar']);
        });
    }
};
