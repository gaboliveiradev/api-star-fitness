<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->foreignUuid('id_person')->constrained('persons')->onDelete('cascade')->nullable(false);
            $table->string('cref', 15)->nullable(false);
            $table->string('observation', 1000)->nullable(true);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
