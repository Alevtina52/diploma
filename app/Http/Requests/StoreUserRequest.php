<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'login' => 'required|string|unique:users,login',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,user',
        ];
    }
}
