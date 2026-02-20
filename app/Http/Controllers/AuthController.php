<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\DTO\LoginDTO;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $dto = new LoginDTO(
            login: $request->login,
            password: $request->password
        );

        if ($this->authService->login($dto, $request)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'login' => 'Неверный логин или пароль',
        ])->onlyInput('login');
    }
    public function logout(Request $request)
    {
        $this->authService->logout($request);

        return redirect('/login');
    }
}
