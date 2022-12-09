<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Plan;
use App\Models\Status;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Support\Str;

class ClientTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @test
     */
    public function user_has_transactions()
    {
        $user = User::factory()->create();
        $user->assignRole('client');
        
        $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
            'plan_id' => Plan::firstWhere('name', 'beginner')->id,
            'amount' => 400
        ]);

        $transactions = $user->transactions;
        $this->assertInstanceOf(Transaction::class, $transactions->first());
        $this->assertEquals(1, count($transactions));
    }

    /**
     * @test
     */
    public function it_gets_user_transactions()
    {
        $user = User::factory()->create();
        $user->assignRole('client');
        $client = Client::find($user->id);
        
        $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
            'plan_id' => Plan::firstWhere('name', 'beginner')->id,
            'amount' => 400
        ])->assertStatus(201);

        $transactions = $client->depositTransactions;

        dump($transactions);
        $this->assertInstanceOf(Transaction::class, $transactions->first());
        $this->assertEquals(1, count($transactions));
    }

    /**
     * @test
     */
    public function it_gets_user_subscriptions()
    {
        $user = User::factory()->create();
        $user->assignRole('client');
        $client = Client::find($user->id);
        
        $transaction = $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
            'plan_id' => 2,
            'amount' => 400
        ]);

        for($i = 400; $i<1000; $i += 100){
            $transaction = $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
                'plan_id' => Plan::firstWhere('name', 'beginner')->id,
                'amount' => $i
            ]);
            $transaction->assertStatus(201);

            $this->actingAs(User::find($user->id))->post(uri:'/client/deposit/subscribe/complete', data:[
                'deposit_id' => Transaction::find($transaction->json('data')['id'])->transactionable->id,
                'tx' => Str::random(13),
                'receiver_address' => Str::random(13),
            ])->assertStatus(200);
        }

        $subscriptions = $client->subscriptions(1, status: "PROCESSING")->get();
        
        $this->assertInstanceOf(Transaction::class, $subscriptions->first());
        $this->assertEquals(6, count($subscriptions));
    }
    
}
