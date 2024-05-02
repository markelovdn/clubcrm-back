<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseTransactions;
    public function testBaseRegistration(): void
    {
        $response = $this->post('api/register', [
            'email' => 'test@test.ru',
            'password' => 'test',
            'password_confirmation' => 'test',
            'phone' => 'test',
            'subDomain' => 'test',
        ]);

        $response->assertStatus(200);
    }
}
