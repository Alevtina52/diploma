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
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'login'    => 'required|string|max:255|unique:users,login',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,user',
        ]);

        $this->userService->create($data);

        return redirect()->route('admin.users.index');
    }

    public function index()
    {
        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));
    }
}
