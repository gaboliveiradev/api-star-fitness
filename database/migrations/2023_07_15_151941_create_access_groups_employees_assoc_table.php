<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('access_groups_employees_assoc', function (Blueprint $table) {
            $table->foreignId('id_access_group')->references('id')->on('access_groups')->nullable(false);
            $table->foreignId('id_employee')->references('id')->on('employees')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_groups_employees_assoc');
    }
};
