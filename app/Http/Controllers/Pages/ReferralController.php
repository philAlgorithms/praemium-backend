<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\ReferralEarning;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

class ReferralController extends Controller
{
    public function admin_view(Request $request){
        $scripts= [
            'dashboard/js/plugins/datatables.js',
            'dashboard/js/custom/view-deposits.js'
        ];

        $user = auth()->user();
		$admin = Admin::find($user->id);
		
        $earnings = ReferralEarning::all();

        return view('dashboard.referral.all',compact(['admin', 'earnings', 'scripts']));
    }

    public function view(Request $request){
        $scripts= [
            'dashboard/js/plugins/datatables.js',
            'dashboard/js/custom/view-deposits.js'
        ];

        $client = client();
		
        $earnings = $client->referralEarnings()->get();

        return view('dashboard.referral.view',compact(['client', 'earnings', 'scripts']));
    }

    public function subscribe(Request $request){
		$scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/plans/subscribe.js'
		];

		$client = client();
		$plans = Plan::all();
		
		return view('dashboard.deposit.subscribe', compact(['scripts', 'client', 'plans']));
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

		$coin_price = $gecko->simple()->getPrice($coin->coinlib_name, 'usd')[$coin->coinlib_name]['usd'];
		$price = dp($amount/$coin_price, 5);
		
		$payLink = 'https://link.trustwallet.com/send?asset=c' . $coin->trust_wallet_id . '&address=' . $wallet->address . '&amount=' . $price;

		return view('dashboard.deposit.deposit', compact(['scripts', 'wallet', 'payLink', 'amount', 'price', 'plan']));
	}
	
	public function admin_viewOld()
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