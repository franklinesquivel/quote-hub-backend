<?php

namespace App\Http\Controllers\Users;

use App\Constants\UserTypesConstant;
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

        if ($data['password'] !== $data['confirm_password']) {
            return response()->json([
                'Message' => "Passwords don't match. Please verify the confirm password input."
            ], 400);
        }

        $user = User::create(
            [
                'email' => $data['email'],
                'username' => $data['username'],
                'name' => $data['name'],
                'password' => Hash::make($data['password']),
                'type' => UserTypesConstant::USER
            ]
        );

        return response()->json($user, 201);
    }
}
