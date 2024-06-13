<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    public function getRoles($user = null)
    {
        if ($user && ($user->isAdmin() || $user->isRoot())) {
            return Role::where('code', '!=', 'root')->get();
        } else {
            return Role::orderBy('title')->whereIn('code', Role::$publicRoles)->get();
        }

        return [];
    }
}
