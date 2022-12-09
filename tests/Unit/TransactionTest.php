<?php

namespace Tests\Unit;

use App\Models\Client;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    /**
     * @test
     */
    public function it_gets_deposit()
    {
        $user = User::factory()->create();
        $user->assignRole('client');
        $client = Client::find($user->id);
        
        $response = $this->actingAs(User::find($user->id))->post(uri:'client/deposit/subscribe', data:[
            'plan_id' => Plan::firstWhere('name', 'beginner')->id,
            'amount' => 400
        ]);

        $transaction = $client->transactions->first();

        dump($transaction->transactionable);
        //dump($transaction);
        $this->assertInstanceOf(Transaction::class, $transaction);
    }
}
