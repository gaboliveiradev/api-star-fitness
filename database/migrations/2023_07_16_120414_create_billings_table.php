<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->date('invoice_date')->nullable(false);
            $table->date('due_date')->nullable(false);
            $table->date('payment_date')->default(null);
            $table->foreignUuid('id_gym_member')->constrained('gym_members')->onDelete('cascade')->nullable(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
