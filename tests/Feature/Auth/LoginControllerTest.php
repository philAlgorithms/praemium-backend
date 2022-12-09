<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{ 
    use DatabaseTransactions;

    /**
     * @test
     */
    public function itLogsinUser()
    {
        $password = "12345";
        $user = User::factory()->create(['password' => bcrypt($password)]);

        echo $user->password;
        $response = $this->post(uri:'/auth/login', data:[
            'email' => $user->email,
            'password' => $password,
        ]);
        
        $response->dump();
        $response->assertStatus(200);    
    }
}
