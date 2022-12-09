<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function itRegistersTalent()
    {
        $response = $this->post(uri:'/auth/signup', data:[
            'name' => 'John Doe',
            'username' => 'john_the_doe',
            'email' => 'example@gmail.com',
            'password' => 'praemium2022#!',
            'password_confirmation' => 'praemium2022#!',
            'country' => 226,
        ]);
        
        $response->dump();
        $response->assertStatus(201);    
    }
}
