<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meals_foods_assoc', function (Blueprint $table) {
            $table->foreignUuid('id_meal')->constrained('meals')->onDelete('cascade')->nullable(false);
            $table->foreignUuid('id_food')->constrained('foods')->onDelete('cascade')->nullable(false);
            $table->double('serving')->nullable(false);
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
        Schema::dropIfExists('meals_foods_assoc');
    }
};
