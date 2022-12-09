<?php

namespace Database\Factories;

use App\Models\Deposit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanEarning>
 */
class PlanEarningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'index' => 0,
            'deposit_id' => Deposit::factory(),
            'amount' => 5,
            'pay_date' => $this->faker->dateTimeBetween('+0 days', '+28 days'),
            'roi' => 12,
            'earned' => 0
        ];
    }
}
