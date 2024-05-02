<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function getAll(): Collection
    {
        return User::get();
    }
    public function getOne($id): ?User
    {
        return User::with('roles')->findOrFail($id);
    }
}
