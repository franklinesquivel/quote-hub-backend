<?php

use App\Constants\QuoteProposalTypesConstant;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('quote_proposals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('status', 8)->default(QuoteProposalTypesConstant::PENDING);
            $table->string('rejected_reason')->nullable();
            $table->date('rejected_at')->nullable();
            $table->foreignUuid('quote_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_proposals');
    }
};
