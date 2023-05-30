<?php

namespace App\Http\Controllers\Quotes\Proposals;

use App\Constants\QuoteTypesConstant;
use App\Constants\UserTypesAbilitiesConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quotes\CreateQuoteRequest;
use App\Models\Quote;
use App\Models\QuoteProposal;
use Illuminate\Http\JsonResponse;

class CreateQuoteProposalController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'abilities:' . UserTypesAbilitiesConstant::USER]);
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


        $proposal = QuoteProposal::create([
            "quote_id" => $quote->id
        ]);

        return response()->json(compact('quote', 'proposal'), 201);
    }
}
