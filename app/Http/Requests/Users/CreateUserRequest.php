<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[.@$!%*?&])[A-Za-z\d.@$!%*?&]{8,}$/',
            'confirm_password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[.@$!%*?&])[A-Za-z\d.@$!%*?&]{8,}$/|same:password',
            'name' => 'required|string',
        ];
    }
}
