<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gym_members', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->foreignUuid('id_person')->constrained('persons')->onDelete('cascade')->nullable(false);
            $table->string('height_cm')->nullable(true);
            $table->string('weight_kg')->nullable(true);
            $table->string('observation')->nullable(true);
            $table->foreignUuid('id_enrollment')->constrained('enrollments')->onDelete('cascade')->nullable(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gym_members');
    }
};