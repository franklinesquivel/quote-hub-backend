<?php

namespace App\Http\Requests\QuoteProposals;

use App\Constants\QuoteProposalTypesConstant;
use Illuminate\Foundation\Http\FormRequest;

class ReviewQuoteProposalRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rejected_reason' => 'nullable|string',
            'status' => 'required|in:' . QuoteProposalTypesConstant::PENDING . ',' . QuoteProposalTypesConstant::ACCEPTED . ',' . QuoteProposalTypesConstant::REJECTED,
        ];
    }
}
