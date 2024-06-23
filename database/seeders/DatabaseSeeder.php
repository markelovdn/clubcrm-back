<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            DistrictSeeder::class,
            RegionSeeder::class,
            AddressSeeder::class,

            RoleSeeder::class,
            UserSeeder::class,
            UserRolesSeeder::class,
            OrganizationSeeder::class,
        ]);
    }
}
