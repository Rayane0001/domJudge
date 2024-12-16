<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->foreignId('competition_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('challenges', function (Blueprint $table) {
            $table->dropColumn('competition_id');
        });
    }
};