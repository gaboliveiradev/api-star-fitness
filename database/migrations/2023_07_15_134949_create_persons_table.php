<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(false);
            $table->string('document', 11)->nullable(false);
            $table->string('phone', 11)->nullable(false);
            $table->date('birthday')->nullable(false);
            $table->string('gender', 1)->nullable(false);
            $table->string('photo_url')->nullable(true);
            $table->foreignId('id_address')->references('id')->on('adresses')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
