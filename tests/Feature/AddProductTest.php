<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_add_a_product(): void
    {
       $response = $this->post('http://127.0.0.1:8000/api/add', [
             'name' => 'Ermira',
             'description' => 'Bajrami',
             'price' => 299,
             'imageURL' => 'Ermira654',
             'views' => 3,
             'category_id' => 2,
             'company_id' => 4
         ]);

        $response->assertStatus(200);
    }
}
