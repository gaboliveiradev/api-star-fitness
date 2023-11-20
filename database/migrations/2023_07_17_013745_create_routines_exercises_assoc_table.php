<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('routines_exercises_assoc', function (Blueprint $table) {
            $table->foreignUuid('id_workout_routine')->constrained('workouts_routines')->onDelete('cascade')->nullable(false);
            $table->foreignUuid('id_exercise')->constrained('exercises')->onDelete('cascade')->nullable(false);
            $table->string('week_day')->nullable(false);
            $table->integer('sets')->nullable(false); 
            $table->integer('repetitions')->nullable(false);
            $table->time('rest_seconds')->nullable(false);
            $table->string('observation')->nullable(true)->default(null);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('routines_exercises_assoc');
    }
};
