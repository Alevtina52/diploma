<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Показать форму входа
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Обработка входа
     */
    public function login(Request $request)
    {
        // Валидация
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Попытка авторизации
        if (Auth::attempt($credentials)) {

            // Перегенерация сессии (защита)
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'login' => 'Неверный логин или пароль',
        ])->onlyInput('login');
    }

    /**
     * Выход
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
