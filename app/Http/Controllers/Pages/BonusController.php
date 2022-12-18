<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use BaseHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Client;
use App\Models\Admin;
use App\Models\AdminWallet;
use App\Models\Bonus;
use App\Models\Plan;
use App\Models\ClientPlan;

class BonusController extends Controller
{
    public function grant()
    {
		$user = auth()->user();
		$admin = Admin::find($user->id);

		$scripts= [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/plugins/choices.min.js',
			'dashboard/js/custom/bonus/grant.js'
		];
		return view('dashboard.bonus.grant',compact(['admin', 'scripts']));
    }

    public function admin_view(Request $request){
        $scripts= [
            'dashboard/js/plugins/datatables.js',
            'dashboard/js/custom/view-deposits.js'
        ];

        $user = auth()->user();
		$admin = Admin::find($user->id);
		
        $earnings = Bonus::latest('created_at')->get();

        return view('dashboard.bonus.all',compact(['admin', 'earnings', 'scripts']));
    }

	public function view(Request $request){
        $scripts= [
            'dashboard/js/plugins/datatables.js',
            'dashboard/js/custom/view-deposits.js'
        ];

        $client = client();
		
        $earnings = $client->bonuses()->latest('created_at')->get();

        return view('dashboard.bonus.view',compact(['client', 'earnings', 'scripts']));
    }
}
