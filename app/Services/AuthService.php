<?php

namespace App\Services;

use App\DTO\LoginDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthService
{
    public function login(LoginDTO $dto, Request $request): bool
    {
        if (Auth::attempt([
            'login' => $dto->login,
            'password' => $dto->password,
        ])) {
            $request->session()->regenerate();
            return true;
        }

        return false;
    }
    public function logout(Request $request): void
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
