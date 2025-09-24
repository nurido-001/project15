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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // nama pengguna
            $table->string('email')->unique();   // email unik
            $table->string('password');          // password (wajib, untuk login)

            // Relasi ke administrator
            $table->foreignId('administrator_id')
                  ->nullable()
                  ->constrained('administrators')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
