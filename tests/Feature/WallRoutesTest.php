<?php

namespace Tests\Feature;

use App\User;
use App\Wall;
use Tests\TestCase;
use Faker\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WallRoutesTest extends TestCase
{
    /**
     * Test wall with auth
     *
     * @return void
     */
    public function testWallAuth()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->get('/api/wall');
        $response->assertStatus(200)
            ->assertJson([
                'success' => [
                    'current_page' => true,
                    'data' => true,
                    'total' => true,
                ]
            ]);
    }
    /**
     * Test wall without auth
     *
     * @return void
     */
    public function testWallWithoutAuth()
    {
        $response = $this->get('/api/wall');
        $response->assertStatus(200)
            ->assertJson([
                'success' => [
                    'current_page' => true,
                    'data' => true,
                    'total' => true,
                ]
            ]);
    }

    /**
     * Tests the  wall insert
     */
    public function testWallInsert()
    {

        $user = factory(User::class)->create();
        $this->faker = Factory::create();
        $response = $this->actingAs($user, 'api')->call('POST', 'api/wall', [
            'user_id' => $user->id,
            'wall_content' =>  $this->faker->word,
        ]);
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }

    /**
     * Tests the  wall delete
     */
    public function testWallDelete()
    {

        $user = factory(User::class)->create();
        $wall = factory(Wall::class)->create(['user_id'=>$user->id]);
        $this->faker = Factory::create();
        $response = $this->actingAs($user, 'api')->call('DELETE', 'api/wall/'.$wall->id);
        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }
}
