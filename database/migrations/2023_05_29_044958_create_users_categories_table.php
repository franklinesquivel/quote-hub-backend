<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id');
            $table->foreignUuid('category_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users_categories');
    }
};
