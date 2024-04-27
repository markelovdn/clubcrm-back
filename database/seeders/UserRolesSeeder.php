<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;

class UserRolesSeeder extends Seeder
{
    public function run()
    {
        $users = User::where('id', '!=', 1)->get();
        $roles = Role::where('code', '!=', 'root')->get()->keyBy('code');

        foreach ($users as $user) {
            $userRoles = $roles->random(rand(1, 3))->pluck('id');
            $user->roles()->sync($userRoles);
        }
    }
}
