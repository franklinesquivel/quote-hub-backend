<?php

namespace App\Http\Requests\QuoteProposal;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuoteProposalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'rejected_reason' => 'nullable|string',
            'status' => 'required|string',
        ];
    }
}
