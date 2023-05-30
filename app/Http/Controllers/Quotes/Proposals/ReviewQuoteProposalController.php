<?php

namespace App\Http\Controllers\Quotes\Proposals;

use App\Constants\QuoteProposalTypesConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteProposals\ReviewQuoteProposalRequest;
use App\Models\QuoteProposal;
use Illuminate\Http\JsonResponse;

class ReviewQuoteProposalController extends Controller
{
    public function __invoke(ReviewQuoteProposalRequest $request, QuoteProposal $quote_proposal): JsonResponse

    {
        $data = $request->validated();

        $quote_proposal->status = $data['status'];
        $quote_proposal->rejected_reason = $data['rejected_reason'];

        if ($data['status'] === QuoteProposalTypesConstant::REJECTED) {
            $quote_proposal->rejected_at = now();
        }

        $quote_proposal->save();

        return response()->json([], 204);
    }
}
