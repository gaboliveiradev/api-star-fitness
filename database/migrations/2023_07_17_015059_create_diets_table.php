<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diets', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('name')->nullable(false);
            $table->foreignUuid('id_gym_member')->constrained('gym_members')->onDelete('cascade')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diets');
    }
};
