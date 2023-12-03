<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evolutions_exercises_assoc', function (Blueprint $table) {
            $table->foreignId('id_evolution')->references('id')->on('evolutions')->nullable(false);
            $table->foreignId('id_exercise')->references('id')->on('exercises')->nullable(false);
            $table->string('muscle')->nullable(false);
            $table->integer('repetitions')->nullable(false);
            $table->double('weight')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evolutions_exercises_assoc');
    }
};
