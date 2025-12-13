<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder user dan pupuk
        $this->call([
            UserSeeder::class,
            PupukSeeder::class,
        ]);
    }
}
