<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
     public function test_Create_Comapany(): void
    {
         $response = $this->post('http://127.0.0.1:8000/api/company', [
    'name' => 'Ermira',
    'keywords' => 'hello',
    'country' => 'kosovo',
    'web_adress' => 'ermirabajrami@gmail.com',
    'more_info' => '044223223',
    'budged' => 'Albania',
    'type' => 'F',
    'taxpayer_office' => "102",
    'TIN' => "102",
    'category' => 'hello',
    'subcategory' => 'hello',

]);
$response->assertStatus(201);
    }
}