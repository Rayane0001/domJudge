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
        // Création de la table 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('name'); // Nom de l'utilisateur
            $table->string('email')->unique(); // Email unique
            $table->timestamp('email_verified_at')->nullable(); // Email vérifié (peut être null)
            $table->string('password'); // Mot de passe
            $table->rememberToken(); // Jeton pour se souvenir des connexions
            $table->timestamps(); // Champs created_at et updated_at
        });

        // Création de la table 'password_reset_tokens'
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email comme clé primaire
            $table->string('token'); // Token de réinitialisation
            $table->timestamp('created_at')->nullable(); // Date de création
        });

        // Création de la table 'sessions'
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Identifiant unique de session
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Clé étrangère vers users
            $table->string('ip_address', 45)->nullable(); // Adresse IP (support IPv4/IPv6)
            $table->text('user_agent')->nullable(); // Informations sur le navigateur
            $table->longText('payload'); // Données de session
            $table->integer('last_activity')->index(); // Dernière activité
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Suppression des tables dans l'ordre inverse pour éviter les problèmes de contraintes
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
