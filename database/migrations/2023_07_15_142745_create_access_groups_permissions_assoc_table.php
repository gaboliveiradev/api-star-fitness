<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('access_groups_permissions_assoc', function (Blueprint $table) {
            $table->foreignUuid('id_access_group')->constrained('access_groups')->onDelete('cascade')->nullable(false);
            $table->foreignUuid('id_permission')->constrained('permissions')->onDelete('cascade')->nullable(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('access_groups_permissions_assoc');
    }
};
