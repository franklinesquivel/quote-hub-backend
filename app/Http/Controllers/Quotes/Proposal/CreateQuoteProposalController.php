<?php

namespace App\Http\Controllers\QuoteProposal;

use App\Constants\QuoteProposalTypeConstant;
use App\Constants\QuoteTypesConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quotes\CreateQuoteRequest;
use App\Models\Quote;
use App\Models\QuoteProposal;
use Illuminate\Http\JsonResponse;

class CreateQuoteProposalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(CreateQuoteRequest $request): JsonResponse
    {
        $data = $request->validated();

        $quote = Quote::create(array_merge(
            $data,
            [
                'type' => QuoteTypesConstant::PROPER,
                'user_id' => auth()->id(),
            ]
        ));


        $quote_proposal = QuoteProposal::create([
            "quote_id" => $quote->id
        ]);

        return response()->json(array_merge(
            $quote->toArray(),
            [
                'status' => QuoteProposalTypeConstant::PENDING,
                'quote_proposal_id' => $quote_proposal->id
            ]
        ), 201);
    }
}
