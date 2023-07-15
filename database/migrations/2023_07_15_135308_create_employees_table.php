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
            $table->string('name', 150)->nullable(false);
            $table->string('email', 150)->nullable(false);
            $table->string('password', 150)->nullable(false);
            $table->string('document', 11)->nullable(false);
            $table->string('cref', 15)->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('observation', 1000)->nullable(false);
            $table->foreignUuid('id_address')->constrained('adresses')->onDelete('cascade')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
