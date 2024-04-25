<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testBaseRegistration(): void
    {
        $response = $this->post('api/register', [
            'email' => 'test@test.ru',
            'password' => 'test',
            'password_confirmation' => 'test',
            'phone' => 'test',
        ]);

        $response->assertStatus(200);
    }
}
