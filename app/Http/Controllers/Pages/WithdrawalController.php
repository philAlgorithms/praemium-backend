<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use Illuminate\Support\Facades\Redirect;

class WithdrawalController extends Controller
{
    public function withdraw(Request $request){
		$client = client();
		$wallets = $client->wallets;
		$plans = Plan::all();

		return Plan::firstWhere('name', 'Test')->activeEarning($client);
		if($wallets->count() == 0){
			return Redirect::To('/profile#addresses');
		};
		$first_wallet = firstWallet($wallets,'btc');
		$scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/withdrawals/withdraw.js',
	    	'dashboard/js/custom/wallets/add.js'
		];
		
		return view('dashboard.withdrawal.submit', compact(['client','scripts', 'plans', 'wallets', 'first_wallet']));
	} 

	public function deposit(Request $request)
    {
        $scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
            'dashboard/js/custom/deposit/deposit.js'
		];

		$gecko = new CoinGeckoClient();


		$amount = $request->amount;

		$wallet = Wallet::whereRelation('user', function($query){
			$query->whereRelation('roles', function($q){
				$q->where('name', 'admin');
			});
		})->where('coin_id', request('coin'))->first();
		$coin = $wallet->coin;

		$plan = Plan::find($request->plan);

		$coin_price = $gecko->simple()->getPrice($coin->name, 'usd')[$coin->name]['usd'];
		$price = dp($amount/$coin_price, 5);
		
		$payLink = 'https://link.trustwallet.com/send?asset=c' . $coin->trust_wallet_id . '&address=' . $wallet->address . '&amount=' . $price;

		return view('dashboard.deposit.deposit', compact(['scripts', 'wallet', 'payLink', 'amount', 'price', 'plan']));
	}
	
	public function admin_view()
    {
		$user = auth()->user();
		$admin = Admin::find($user->id);
		
		$deposits = Deposit::all();


		$scripts= [
			'dashboard/js/plugins/dragula/dragula.min.js',
			'dashboard/js/plugins/jkanban/jkanban.js',
			'dashboard/js/plugins/datatables.js',
			'dashboard/js/custom/view-deposits.js'
		];
		return view('dashboard.deposit.all',compact(['admin','deposits', 'scripts']));
    }
	
	public function manage($id)
    {
        $scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/deposit/manage.js',
		];
		
		$deposit = Deposit::find($id);
		if(is_null($deposit)) abort(404);

        return view('dashboard.deposit.manage', compact(['scripts', 'deposit']));
    }
}