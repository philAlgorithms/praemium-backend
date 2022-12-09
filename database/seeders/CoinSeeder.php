<?php

namespace Database\Seeders;

use App\Models\Coin;
use App\Models\Explorer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coins = [
            [
                "name" => "bitcoin",
                "display_name" => "Bitcoin",
                "code" => "btc",
                "default_explorer_id" => Explorer::firstWhere('name', 'Blockchain')->id,
            ],
            [
                "name" => "ethereum",
                "display_name" => "Ethereum",
                "code" => "eth",
                "default_explorer_id" => Explorer::firstWhere('name', 'Etherscan')->id,
            ],
            [
                "name" => "tether",
                "display_name" => "Tether USDT",
                "code" => "usdt",
                "default_explorer_id" => Explorer::firstWhere('name', 'Etherscan')->id,
            ],
            [
                "name" => "binance",
                "display_name" => "Binance",
                "code" => "bnb",
                "default_explorer_id" => Explorer::firstWhere('name', 'Binance')->id,
            ],
            [
                "name" => "binance",
                "display_name" => "Smart Chain",
                "code" => "bnb",
                "default_explorer_id" => Explorer::firstWhere('name', 'BscScan')->id,
            ],
        ];

        foreach($coins as $coin)
        {
            Coin::create($coin);
        }
    }
}
