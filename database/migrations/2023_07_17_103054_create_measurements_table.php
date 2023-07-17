<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->double('chest')->default(null);
            $table->double('glute')->default(null);
            $table->double('left_arm')->default(null);
            $table->double('right_arm')->default(null);
            $table->double('left_calf')->default(null);
            $table->double('right_calf')->default(null);
            $table->double('left_forearm')->default(null);
            $table->double('right_forearm')->default(null);
            $table->double('left_quadriceps')->default(null);
            $table->double('right_quadriceps')->default(null);
            $table->foreignUuid('id_evolution')->constrained('evolutions')->onDelete('cascade')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('measurements');
    }
};
