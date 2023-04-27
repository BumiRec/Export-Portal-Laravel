<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    public function test_user_can_view_a_login_form()
    {
        $user = User::factory()->create([
            'email' => 'rezon@user.com',
            'password' => bcrypt('123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'rezon@user.com',
            'password' => '1234',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
        
    }
}
