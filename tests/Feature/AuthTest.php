<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_example(): void
    {
        $response = $this->get('api/register', [
            'email' => 'test@test.ru',
            'password' => 'test',
            'password_confirmation' => 'test',
            'phone' => 'test',
        ]);
        $response->dd();

        $response->assertStatus(200);
    }
}
