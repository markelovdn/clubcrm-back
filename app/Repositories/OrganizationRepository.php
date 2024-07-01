<?php

namespace App\Repositories;

use App\Models\Organization;

class OrganizationRepository
{
    public function getAll()
    {
        return Organization::get();
    }

    public function getAllWithAddresses()
    {
        return Organization::with('addresses.region')->get();
    }

    public function getOne($id)
    {
        return Organization::with('addresses', 'users')->findOrFail($id);
    }
}
