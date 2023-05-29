<?php

namespace App\Http\Controllers\Quotes;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetUserFavoriteQuotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();
        return response()->json($user->quotes()->get());
    }
}
