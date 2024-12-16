<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'équipe
            $table->string('university'); // Université
            $table->text('description')->nullable(); // Description optionnelle
            $table->string('visual')->nullable(); // Logo ou image de l'équipe
            $table->timestamp('creation_date')->nullable(); // Date de création
            $table->foreignId('competition_id')->constrained('competitions')->onDelete('cascade'); // Compétition associée
            $table->foreignId('coach_id')->constrained('users')->onDelete('cascade'); // Coach (utilisateur)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
