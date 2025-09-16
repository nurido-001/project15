<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
// DatabaseSeeder.php
public function run(): void
{
    // Buat user dummy
    User::factory(10)->create();

    // Buat 1 test user hanya jika belum ada
    if (!User::where('email', 'test@example.com')->exists()) {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    // Panggil AdminUserSeeder
    $this->call(AdminUserSeeder::class);
}

}
