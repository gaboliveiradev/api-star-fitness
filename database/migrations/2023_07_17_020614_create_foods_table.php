<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('name')->nullable(false);
            $table->double('carbohydrates')->nullable(false);
            $table->double('proteins')->nullable(false);
            $table->double('fats')->nullable(false);
            $table->double('calories')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
