<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CustomProfileTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {


        $user = User::factory()->create();

        $this->actingAs($user);


        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }
}
