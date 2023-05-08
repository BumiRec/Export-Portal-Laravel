<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModifyItemTest extends TestCase
{
    /**
     * A basic feature test example.
     */
     public function test_modify_item(): void
    {
        $response = $this->put('http://127.0.0.1:8000/api/product/1', [

             'name' => 'Ermira',
             'description' => 'Bajrami',
             'price' => 299,
             'imageURL' => 'Ermira654',

         ]);

        $response->assertStatus(200);
    }
}
