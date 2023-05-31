<?php

namespace App\Http\Controllers\Quotes;

use App\Constants\QuoteTypesConstant;
use App\Constants\UserTypesAbilitiesConstant;
use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\JsonResponse;

class DeleteFavoriteQuoteController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'abilities:' . UserTypesAbilitiesConstant::USER]);
    }

    public function __invoke(Quote $quote): JsonResponse
    {
        if ($quote->type !== QuoteTypesConstant::FAVORITE) {
            abort(409, 'Conflict');
        }

        if ($quote->user->id !== auth()->id()) {
            abort(403, 'Forbidden');
        }

        $quote->delete();
        return response()->json([], 204);
    }
}
