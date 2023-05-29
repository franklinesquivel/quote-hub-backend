<?php

namespace App\Http\Requests\Quotes;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|uuid|exists:categories,id',
            'author' => 'required|string',
            'quote' => 'required|string'
        ];
    }
}
