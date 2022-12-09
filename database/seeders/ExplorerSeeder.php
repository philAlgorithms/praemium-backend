<?php

namespace Database\Seeders;

use App\Models\Explorer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExplorerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $explorers = [
            [
                "name" => "Blockchain",
                "url" => "https://blockchain.com"
            ],
            [
                "name" => "Blockchair",
                "url" => "https://blockchair.com"
            ],
            [
                "name" => "Etherscan",
                "url" => "https://etherscan.io"
            ],
            [
                "name" => "Binance",
                "url" => "https://explorer.binance.com"
            ],
            [
                "name" => "BscScan",
                "url" => "https://bscscan.com"
            ],
            [
                "name" => "Shelley Explorer",
                "url" => "https://shelleyexplorer.com"
            ]
        ];

        foreach($explorers as $explorer)
        {
            Explorer::create($explorer);
        }
    }
}
