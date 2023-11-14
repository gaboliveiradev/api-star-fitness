<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('name')->nullable(false);
            $table->string('exercise_gif')->nullable(true)->default(null);
            $table->string('equipment_gym_photo')->nullable(true)->default(null);
            $table->string('muscle_groups')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
