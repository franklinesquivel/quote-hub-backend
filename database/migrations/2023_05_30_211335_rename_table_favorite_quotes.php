<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::rename('favorite_quotes', 'quotes');
    }


    public function down(): void
    {
        Schema::rename('quotes', 'favorite_quotes');
    }
};
