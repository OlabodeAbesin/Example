<?php
declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test creating a user
     *
     * @return void
     */
    public function test_create_user()
    {
        $userData = [
            "name" => "John Doe",
            "email" => Str::random(8).'@example.com',
            "password" => "demo12345"
        ];

        $this->json('POST', 'api/users', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    /**
     * Test creating with invalid data
     *
     * @return void
     */
    public function test_create_user_with_invalid_data()
    {
        $userData = [
            "name" => "John Doe",
            "email" => "doe@example.com"
        ];

        $this->json('POST', 'api/users', $userData, ['Accept' => 'application/json'])
        ->assertStatus(422);
        //->assertJson([
        //    "message" => "The password field is required",
        //    "errors" => [
        //        "password" => ["The password field is required"]
        //    ]
        //]);
    }
}
