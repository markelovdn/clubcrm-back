<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        Organization::factory(2)->create();

        $organizations = Organization::all();

        foreach ($organizations as $organization) {
            $addres = Address::inRandomOrder()->first();
            $user = User::inRandomOrder()->first();
            $organization->addresses()->attach($addres->id);
            $organization->users()->attach($user->id);
        }
    }
}
