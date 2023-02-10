<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Login;

class LoginTest extends TestCase
{
    use RefreshDatabase; // this will refresh the database after each test

    public function test_login_in_google()
    {
        $this->withoutExceptionHandling();
        $this->post('/login', [
            'email' => 'test@gmail.com' ,
            'token' => '*********' ,
        ]);
        $data =Login::first() ;

        $response = $this->patch('/login/home/' . $data->id,[
            'email' => 'test@gmail.com' ,
            'token' => '1234#abcd' ,
        ]);

        $token_re =Login::first() ;

        $response->assertJson([
            'message' => 'Login success' ,
            'tokenR' => $token_re->token ,
        ]);
    }
    
}
