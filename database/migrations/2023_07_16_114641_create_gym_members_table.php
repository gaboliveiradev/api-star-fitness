<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gym_members', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('document', 11)->nullable(false);
            $table->string('phone', 11)->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('gender', 1)->nullable(false);
            $table->string('height_cm')->default(null);
            $table->string('weight_kg')->default(null);
            $table->string('photo_url')->default(null);
            $table->string('observation')->default(null);
            $table->foreignUuid('id_enrollment')->constrained('enrollments')->onDelete('cascade')->nullable(false);
            $table->foreignUuid('id_address')->constrained('adresses')->onDelete('cascade')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gym_members');
    }
};
