<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function getAll(): Collection
    {
        return User::with('roles')->get();
    }
    public function getOne($id): ?User
    {
        return User::with('roles')->findOrFail($id);
    }

    public function create(array $data): User
    {
        return User::create([
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make(Str::random(6)),
        ]);
    }
}
