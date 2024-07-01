<?php

namespace Tests;

use App\Models\Role;

trait RoleProviderTrait
{
    public static function roleProvider()
    {
        return [
            [Role::ADMIN],
        ];
    }
}
