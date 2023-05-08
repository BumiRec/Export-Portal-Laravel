<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   public function test_user_can_view_a_login_form()
    {
           $response = $this->post('http://127.0.0.1:8000/api/login', [

             'email' => 'ermirabajram42@gmail.com',
             'password' => 'Ermira654',
         ]);

        $response->assertStatus(200);
        }
}