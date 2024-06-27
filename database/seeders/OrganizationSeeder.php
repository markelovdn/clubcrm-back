<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        Organization::factory(2)->create();

        $organizations = Organization::all();

        foreach ($organizations as $organization) {
            $address = Address::inRandomOrder()->first();
            $organization->addresses()->attach($address->id);
        }
    }
}
