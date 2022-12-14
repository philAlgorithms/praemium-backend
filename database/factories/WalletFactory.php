<?php

namespace Database\Factories;

use App\Models\Coin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'coin_id' => Coin::firstWhere('name', 'bitcoin'),
            'address' => randomString(32),
        ];
    }
}
