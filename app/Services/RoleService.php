<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    public $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
}
