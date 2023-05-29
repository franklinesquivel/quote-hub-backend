<?php

namespace App\Http\Controllers\QuoteProposal;

use App\Constants\QuoteProposalTypeConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuoteProposal\CreateQuoteProposalRequest;
use App\Models\QuoteProposal;

class ReviewQuoteProposalcontroller extends Controller
{

    public function __invoke(CreateQuoteProposalRequest $request, QuoteProposal $quote_proposal)
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
