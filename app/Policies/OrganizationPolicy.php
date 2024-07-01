<?php

namespace App\Policies;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrganizationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, Organization $model): bool
    {
        //
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, User $model): bool
    {
        //
    }

    public function delete(User $user, User $userIdToDelete): bool
    {
        //
    }

    public function restore(User $user): bool
    {
        //
    }

    public function forceDelete(User $user): bool
    {
        //
    }
}
