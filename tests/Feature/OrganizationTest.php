<?php

namespace Tests\Feature;

use App\Models\Role;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\AuthenticatesUserTrait;
use Tests\TestCase;

class OrganizationTest extends TestCase
{
    use AuthenticatesUserTrait;
    use DatabaseTransactions;

    public function testGetOrganizations(): void
    {
        $this->loginAs(Role::ADMIN);

        $response = $this->get('api/organizations');

        $response->assertStatus(200);
    }

    public function testGetAllTitle(): void
    {
        $this->loginAs(Role::PARENTAD);
        $response = $this->get('api/get-all-organizations-title');

        $response->assertStatus(200);
    }
}
