<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('routines_exercises_assoc', function (Blueprint $table) {
            $table->foreignId('id_workout_routine')->references('id')->on('workouts_routines')->nullable(false);
            $table->foreignId('id_exercise')->references('id')->on('exercises')->nullable(false);
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
