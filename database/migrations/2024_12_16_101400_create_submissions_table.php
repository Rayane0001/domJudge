<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('submissions', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->text('description')->nullable();
      $table->timestamp('submission_date')->nullable();
      $table->string('solution_file')->nullable();
      $table->string('result')->nullable();
      $table->foreignId('teams_id')->constrained('teams')->onDelete('cascade');
      $table->foreignId('challenge_id')->constrained('challenges')->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('submissions');
  }
};
