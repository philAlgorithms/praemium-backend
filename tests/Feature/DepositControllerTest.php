<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class DepositControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function itSubscribesATalent()
    {
        $user = User::factory()->create(['password' => bcrypt('12345')]);
        $user->assignRole('client');
        $response = $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
            'plan_id' => Plan::firstWhere('name', 'beginner')->id,
            'amount' => 300
        ]);
        
        $response->assertStatus(201);    
    }

    /**
     * @test
     */
    public function itRestrictsSubscriptionWhenAnotherIsProcessing()
    {
        $user = User::factory()->create(['password' => bcrypt('12345')]);
        $user->assignRole('client');

        $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
            'plan_id' => Plan::firstWhere('name', 'beginner')->id,
            'amount' => 400
        ]);

        sleep(2);

        $response = $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
            'plan_id' => Plan::firstWhere('name', 'beginner')->id,
            'amount' => 300
        ]);
        
        $response->assertStatus(201); 
    }

    /**
     * @test
     */
    public function itCompletesASubscription()
    {
        $user = User::factory()->create(['password' => bcrypt('12345')]);
        $client = Client::find($user->id);

        $user->assignRole('client');
        $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
            'plan_id' => Plan::firstWhere('name', 'beginner')->id,
            'amount' => 300
        ])->assertStatus(201);

        $response = $this->actingAs(User::find($user->id))->post(uri:'/client/deposit/subscribe/complete', data:[
            'deposit_id' => $client->depositTransactions()->first()->transactionable->id,
            'tx' => Str::random(13),
            'receiver_address' => Str::random(13),
        ]);
        
        $response->dump();
        $response->assertOk();    
    }
    
    /**
     * @test
     */
    public function itApprovesADeposit()
    {
        $admin = User::firstWhere('username', 'admin');
        $user = User::factory()->create(['password' => bcrypt('12345')]);
        $client = Client::find($user->id);

        $user->assignRole('client');
        $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
            'plan_id' => Plan::firstWhere('name', 'beginner')->id,
            'amount' => 300
        ])->assertStatus(201);

        $response = $this->actingAs($admin)->post(uri:'/admin/deposit/approve', data:[
            'deposit_id' => $client->depositTransactions()->first()->transactionable->id,
            'receiver_address' => Str::random(13),
        ]);

        $deposit = Deposit::find($client->depositTransactions()->first()->transactionable->id);
        
        dump($client->duePayments()->get());
        $response->assertStatus(200);   
        $this->assertCount($deposit->plan->intervals + 1, $deposit->earnings); 
    }
}
