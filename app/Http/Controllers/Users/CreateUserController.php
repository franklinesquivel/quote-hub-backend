<?php

namespace App\Http\Controllers\Users;

use App\Constants\UserTypesAbilitiesConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller
{

    public function __invoke(CreateUserRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::create(array_merge(
            $data,
            [
                'password' => Hash::make($data['password']),
            ]
        ));

        return response()->json([
            'token' => $user->createToken('web_client', [
                UserTypesAbilitiesConstant::USER
            ])->plainTextToken
        ], 201);
    }
}
