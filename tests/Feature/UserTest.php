<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_cannot_create_user(){
        $response = $this->post('/register',[
            'name' => 'Sumbul',
            'email' => 'sumbul@gmail.com',
            'password' => 'sumbul123',
            'password_confirmation' => 'sumbul123',
            'role' => 'member'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'sumbul@gmail.com'
        ]);

        $user = User::where('email', 'sumbul@gmail.com')->first();

        $this->actingAs($user);

        $response2 = $this->get('/create');
        $response2->assertStatus(403);
    }

    public function test_admin_can_create_user(){
        $response = $this->post('/register',[
            'name' => 'Mimin',
            'email' => 'mimin@gmail.com',
            'password' => 'mimin12345',
            'password_confirmation' => 'mimin12345',
            'role' => 'admin'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'mimin@gmail.com'
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'maman@gmail.com'
        ]);

        $user = User::where('email', 'mimin@gmail.com')->first();

        $this->actingAs($user);

        $response2 = $this->get('/create');
        $response2->assertStatus(200);
    }
}
