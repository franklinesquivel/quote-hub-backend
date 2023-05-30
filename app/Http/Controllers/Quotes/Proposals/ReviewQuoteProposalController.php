<?php

namespace App\Http\Controllers\Quotes\Proposals;

use App\Constants\QuoteProposalTypeConstant;
use App\Constants\UserTypesAbilitiesConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Quotes\Proposal\CreateQuoteProposalRequest;
use App\Models\QuoteProposal;
use Illuminate\Http\JsonResponse;

class ReviewQuoteProposalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'abilities:' . UserTypesAbilitiesConstant::ADMIN]);
    }

    public function __invoke(CreateQuoteProposalRequest $request, QuoteProposal $quote_proposal): JsonResponse
    {
        $data = $request->validated();

        $quote_proposal->status = $data['status'];
        $quote_proposal->rejected_reason = $data['rejected_reason'];

        if ($data['status'] === QuoteProposalTypeConstant::REJECTED) {
            $quote_proposal->rejected_at = now();
        }

        $quote_proposal->save();

        return response()->json($quote_proposal, 201);
    }
}
