<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    /**
     * Tests user login.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $response =  $this->call('POST','/api/login');
        $response->assertStatus(401);
    }
    /**
     * Tests user register.
     *
     * @return void
     */
    public function testUserRegister()
    {
        $response = $this->call('POST','/api/register');
        $response->assertStatus(401);
    }
}
