<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use App\Models\User;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->create($request->validated());

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Пользователь успешно создан');
    }

    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }
}
