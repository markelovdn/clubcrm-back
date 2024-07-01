<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait AuthenticatesUserTrait
{
    private function getAuthUser($roleCode)
    {
        $role = Role::where('code', $roleCode)->firstOrFail();

        $user = User::whereHas('roles', function ($query) use ($role) {
            $query->where('role_id', $role->id);
        })->first();

        if ($user) {
            Auth::login($user);
            return $user;
        }

        return null;
    }

    public function loginAs($roleCode): User
    {
        switch ($roleCode):
            case (Role::ROOT):
                return $this->getAuthUser(Role::ROOT);
            case (Role::ADMIN):
                return $this->getAuthUser(Role::ADMIN);
            case (Role::MANAGER):
                return $this->getAuthUser(Role::MANAGER);
            case (Role::COACH):
                return $this->getAuthUser(Role::COACH);
            case (Role::ATHLETE):
                return $this->getAuthUser(Role::ATHLETE);
            case (Role::REFEREE):
                return $this->getAuthUser(Role::REFEREE);
            case (Role::PARENTAD):
                return $this->getAuthUser(Role::PARENTAD);
        endswitch;
    }
}
