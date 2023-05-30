<?php

namespace App\Http\Controllers\Auth;

use App\Constants\UserTypesAbilitiesConstant;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CreateUserAccessTokenController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->validate([
            'user_identifier' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $data['user_identifier'])
            ->orWhere('username', $data['user_identifier'])
            ->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.']
            ]);
        }

        $user->tokens()->delete();

        return response()->json([
            'token' => $user->createToken('test-token-name', [
                $user->isAdmin() ? UserTypesAbilitiesConstant::ADMIN : UserTypesAbilitiesConstant::USER
            ])->plainTextToken
        ]);
    }
}
