<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gym_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_person')->references('id')->on('persons')->nullable(false);
            $table->foreignId('id_type_enrollment')->references('id')->on('types')->nullable(false);
            $table->string('height_cm')->nullable(true);
            $table->string('weight_kg')->nullable(true);
            $table->string('observation')->nullable(true);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gym_members');
    }
};