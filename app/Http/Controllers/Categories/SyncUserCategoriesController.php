<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SyncUserCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'categories' => 'required|array',
            'categories.*' => 'uuid|distinct|exists:categories,id'
        ]);

        /** @var User $user */
        $user = $request->user();

        $user->categories()->sync($data['categories']);
        return response()->json([], 204);
    }
}
