<?php

namespace App\Http\Controllers\Quotes\Proposals;

use App\Constants\QuoteProposalTypesConstant;
use App\Constants\UserTypesAbilitiesConstant;
use App\Http\Controllers\Controller;
use App\Models\QuoteProposal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetAllPendingForApprovalProposalsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'abilities:' . UserTypesAbilitiesConstant::ADMIN]);
    }

    public function __invoke(Request $request): JsonResponse
    {
        return response()->json(QuoteProposal::where('status', QuoteProposalTypesConstant::PENDING)->get());
    }
}
