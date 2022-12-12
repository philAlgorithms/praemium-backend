<?php

namespace Database\Seeders;

use App\Models\Coin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateCoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Bitcoin' => [
                'name' => 'bitcoin',
                'id' => 859
            ],
            'Ethereum' => [
                'name' => 'ethereum',
                'id' => 145
            ],
            'Binance' => [
                'name' => 'binancecoin',
                'id' => 1209
            ],
            'Smart Chain' => [
                'name' => 'binancecoin',
                'id' => 1209
            ],
            'Tether USDT' => [
                'name' => 'tether',
                'id' => 122882
            ],
        ];

        foreach($data as $name=>$datum)
        {
            $coin = Coin::all()->firstWhere('display_name', $name);
            if(!is_null($coin)){
                $coin->update([
                    'coinlib_name' => $datum['name'],
                    'coinlib_id' => $datum['id']
                ]);
            }
        }
    }
}
