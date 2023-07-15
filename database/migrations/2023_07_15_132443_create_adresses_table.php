<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('street', 100)->nullable(false);
            $table->string('district', 100)->nullable(false);
            $table->string('number', 20)->default(null);
            $table->string('zip_code', 8)->nullable(false);
            $table->foreignUuid('id_city')->constrained('cities')->onDelete('cascade')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adresses');
    }
};
