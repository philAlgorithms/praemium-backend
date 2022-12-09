<?php

namespace Database\Seeders;

use App\Models\Chart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $charts = [
            [
                "name" => "TradingView",
                "key" => "TRADING_VIEW",
                "url" => "https://tradingview.com/"
            ],
        ];

        foreach ($charts as $chart)
        {
            Chart::create($chart);
        }
    }
}
