<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_fetch_starred_repositories()
    {
        $response = $this->postJson('/api/repositories/sync', ['username' => 'octocat']);
        $response->assertStatus(200);
    }
}
