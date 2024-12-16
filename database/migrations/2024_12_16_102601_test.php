<?php

use App\Models\Challenge;
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
        Schema::create('tests', function (Blueprint $table) {
            $table->id(); // ID unique
            $table->string('title'); // Titre du test
            $table->text('description')->nullable(); // Description du test
            $table->timestamps(); // created_at et updated_at
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }


};


