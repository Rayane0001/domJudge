<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création d'un utilisateur de test
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Ajout d'un mot de passe sécurisé
        ]);

        // Appel des autres seeders
        $this->call([
//            TeamSeeder::class,
//            TestSeeder::class, // S'assurer que ce seeder existe bien
            CompetitionSeeder::class, // Ajout du CompetitionSeeder
        ]);
    }
}
