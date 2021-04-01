<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    /** @test */
    public function add_user_without_credentials()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
