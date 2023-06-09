<?php

use App\Constants\QuoteTypesConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->char('type', 8)->default(QuoteTypesConstant::FAVORITE);
        });
    }

    public function down(): void
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
