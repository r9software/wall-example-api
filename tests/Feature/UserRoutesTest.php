<?php

namespace Tests\Feature;

use App\User;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRoutesTest extends TestCase
{
    protected $faker;

    /**
     * Tests the register
     */
    public function testUserRegister()
    {
        $this->faker = Factory::create();
        $this->pwd = $this->faker->word;
        $response = $this->call('POST', 'api/register', [
            'email' => $this->faker->email,
            'password' => $this->pwd,
            'confirmation_password' => $this->pwd,
            'name' => $this->faker->firstName,
        ]);
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * test for details
     */
    public function testUserDetails()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->get('/api/user');
        $response->assertStatus(200)
            ->assertJson([
                'success' => [
                    'name' => true,
                    'email' => true,
                    'id' => true,
                ]
            ]);
    }
}
