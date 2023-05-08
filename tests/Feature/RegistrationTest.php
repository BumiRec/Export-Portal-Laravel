<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;

 class RegistrationTest extends TestCase
 {

    //  A basic feature test example.

    //  public function test_example(): void
    //  {
    //      $response = $this->get('/register');

    //      $response->assertStatus(200);
    //  }
     public function test_new_users_can_register()
     {
         $response = $this->post('http://127.0.0.1:8000/api/register', [
             'name' => 'Ermira',
             'surname' => 'Bajrami',
             'email' => 'ermirabajram42@gmail.com',
             'password' => 'Ermira654',
             'phone_number' => '044306263',
             'country_id' => 1,
             'gender' => 'F',
             'agreementss' => true
         ]);

        $response->assertStatus(201);
     }
 }
