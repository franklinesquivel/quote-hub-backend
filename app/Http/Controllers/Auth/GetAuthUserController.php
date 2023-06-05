<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class GetAuthUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        if (!$user->isAdmin()) {
            $user->load('categories');
        }

        return response()->json($user);
    }
}
