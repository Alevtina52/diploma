<?php

namespace App\Services;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create(array $data): User
    {
        // Находим роль по имени (admin / user)
        $role = Role::where('name', $data['role'])->firstOrFail();

        return User::create([
            'name'     => $data['name'],
            'login'    => $data['login'],
            'password' => Hash::make($data['password']),
            'role_id'  => $role->id,
        ]);
    }
}
