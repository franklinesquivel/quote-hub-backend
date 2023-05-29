<?php

namespace App\Http\Controllers\QuoteProposal;

use App\Http\Controllers\Controller;
use App\Models\QuoteProposal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllQuoteProposalsController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(QuoteProposal::all());
    }
}
