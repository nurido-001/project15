<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom 'role' ke tabel penggunas.
     */
    public function up(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            $table->string('role')->default('pengguna')->after('password');
        });
    }

    /**
     * Hapus kolom 'role' jika migrasi dibatalkan.
     */
    public function down(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
