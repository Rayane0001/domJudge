<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Titre du challenge
            $table->text('description'); // Description du challenge
            $table->string('pdf_link'); // Lien vers le fichier PDF du challenge
            $table->char('letter', 1); // Lettre associée au challenge (A, B, C, etc.)
            $table->timestamps(); // Dates de création et de mise à jour
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
