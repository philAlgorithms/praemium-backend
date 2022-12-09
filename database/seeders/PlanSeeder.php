<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                "name" => "Beginner",
                "color" => "primary",
                "roi" => 12,
                "min" => 250,
                "max" => 9999,
                "intervals" => 4,
                "period_id" => 5,
                "duration_id" => 6
            ],
            [
                "name" => "Advanced",
                "color" => "primary",
                "roi" => 15,
                "min" => 10000,
                "max" => 39999,
                "intervals" => 4,
                "period_id" => 5,
                "duration_id" => 6
            ],
            [
                "name" => "Premium",
                "color" => "primary",
                "roi" => 12,
                "min" => 40000,
                "max" => env('MAX_AMOUNT'),
                "intervals" => 4,
                "period_id" => 5,
                "duration_id" => 6
            ],
        ];

        foreach($plans as $plan)
        {
            Plan::create($plan);
        }
    }
}
