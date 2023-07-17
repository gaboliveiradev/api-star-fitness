<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evolutions_exercises_assoc', function (Blueprint $table) {
            $table->foreignUuid('id_evolution')->constrained('evolutions')->onDelete('cascade')->nullable(false);
            $table->foreignUuid('id_exercise')->constrained('exercises')->onDelete('cascade')->nullable(false);
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
