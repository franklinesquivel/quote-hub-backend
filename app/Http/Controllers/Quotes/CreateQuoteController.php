<?php

namespace App\Http\Controllers\Quotes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quotes\CreateQuoteRequest;
use App\Models\FavoriteQuote;
use Illuminate\Http\JsonResponse;

class CreateQuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(CreateQuoteRequest $request): JsonResponse
    {
        $data = $request->validated();

        $quote = FavoriteQuote::create(array_merge(
            $data,
            ['user_id' => auth()->id()]
        ));

        return response()->json($quote, 201);
    }
}