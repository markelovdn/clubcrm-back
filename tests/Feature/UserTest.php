<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\AuthenticatesUserTrait;
use Tests\TestCase;

class UserTest extends TestCase
{
    use AuthenticatesUserTrait;
    use DatabaseTransactions;

    public function testGetAll(): void
    {
        $this->loginAs(Role::ADMIN);
        $response = $this->get('api/users');

        $response->assertStatus(200);
    }

    public function testGetOne(): void
    {
        $user = $this->loginAs(Role::PARENTAD);
        $response = $this->get('api/users/' . $user->id);

        $response->assertStatus(200)->assertJson(['id' => $user->id]);;
    }

    public function testCreate(): void
    {
        $response = $this->post('api/users', [
            'email' => 'test@test.ru',
            'phone' => '+7 (911) 111-11-11',
            'subDomain' => 'test',
        ]);


        $this->assertDatabaseHas('users', [
            'email' => 'test@test.ru',
        ]);
        $response->assertStatus(200);
    }

    public function testUpdate(): void
    {
        $user = $this->loginAs(Role::PARENTAD);
        $response = $this->put('api/users/' . $user->id, [
            'id' => $user->id,
            'firstName' => 'testUpdated',
            'secondName' => 'testUpdated',
            'middleName' => 'testUpdated',
            'dateBirthday' => '10.10.2010',
            'email' => 'testUpdated@test.ru',
            'phone' => '+7 (911) 111-11-11',
            'subDomain' => 'test',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'testUpdated@test.ru',
        ]);

        $response->assertStatus(200);
    }

    public function testDelete(): void
    {
        $this->loginAs(Role::ADMIN);

        $user = User::find(10);
        $response = $this->delete('api/users/' . $user->id);

        $this->assertSoftDeleted('users', [
            'id' => $user->id,
        ]);

        $response->assertStatus(200);
    }
}
