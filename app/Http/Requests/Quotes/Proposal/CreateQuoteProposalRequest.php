<?php

namespace App\Http\Requests\Quotes\Proposal;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuoteProposalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rejected_reason' => 'nullable|string',
            'status' => 'required|string',
        ];
    }
}
