<?php

namespace Database\Factories;

use App\Models\Coin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween(250, env('MAX_AMOUNT')),
            'client_id' => User::factory(),
            'status_id' => 1,
            'coin_id' => Coin::firstWhere('name', 'bitcoin')->id,
            'sender_address' => randomString(32),
            'receiver_address' => randomString(32),
            'tx' => randomString(32),
        ];
    }

    /**
     * DEfine state for morph columns
     * 
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function transactionable(string $type)
    {
    //     $type_column = "deposit";

    //     switch ($type)
    //     {
    //         case 'deposit':
    //             $type_column =  "App\Models\Deposit";
    //             break;
    //         case 'withdrawal':
    //             $type_column =  "App\Models\Withdrawal";
    //             break;
    //         default:
    //             $type_column =  "App\Models\Deposit";
    //             break;
    //     }
    //     return $this->state(function (array $attributes)
    //     {
    //         return [
    //             "transactionable_type" => $type_column,
    //         ];
    //     });
    }
}