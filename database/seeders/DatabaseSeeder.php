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
        // \App\Models\User::factory(10)->create();

        // On ajoute cette ligne pour lancer notre seeder de services
        $this->call([
            ServiceSeeder::class,
        ]);
    }
}
