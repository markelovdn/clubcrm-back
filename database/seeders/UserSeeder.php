<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $specificUser = User::create([
            'secondname' => 'Маркелов',
            'firstname' => 'Дмитрий',
            'middlename' => 'Николавич',
            'email' => 'markelovdn@gmail.com',
            'phone' => '+7 (961) 087-67-12',
            'password' => Hash::make('123')
        ]);

        $rootRole = Role::where('code', 'root')->first();
        $specificUser->roles()->attach($rootRole);

        User::factory(99)->create();
    }
}
