<?php

namespace Database\Seeders;

use App\Models\Address;
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

        $parentUser = User::create([
            'secondname' => 'Родителев',
            'firstname' => 'Родитель',
            'middlename' => 'Родителевич',
            'email' => 'roditel@roditel.com',
            'phone' => '+7 (111) 111-11-11',
            'password' => Hash::make('123')
        ]);

        $rootRole = Role::where('code', Role::ROOT)->first();
        $adminRole = Role::where('code', Role::ADMIN)->first();
        $parentRole = Role::where('code', Role::PARENTAD)->first();
        $specificUser->roles()->attach($rootRole);
        $specificUser->roles()->attach($adminRole);
        $parentUser->roles()->attach($parentRole);

        User::factory(98)->create();

        $users = User::all();

        foreach ($users as $user) {
            $address = Address::inRandomOrder()->first();
            $user->addresses()->attach($address->id);
        }
    }
}
