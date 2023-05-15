<?php

namespace Tests\Feature;

use Tests\TestCase;

class TokenTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_token(): void
    {
        $response = $this->get('/api/token/2');
        $response->assertStatus(200);
        $response->assertJson([

            'id'     => 2,
            'amount' => 651,

        ]);

    }
}
