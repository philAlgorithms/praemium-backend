<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use App\Models\PlanEarning;
use App\View\Components\Cards\Earnings;
use App\View\Components\Tables\PlanEarnings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MiscController extends Controller
{
    public function dashboard(Request $request){
		$scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/login.js'
		];

		$client = client();
		$earnings = $client->planInterests()->where('earned', 1)->get();
		return view('dashboard.misc.home', compact(['scripts', 'client', 'earnings']));
    }

	public function admin_dashboard(Request $request){
		$scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/login.js'
		];

		$clients = Client::all();
		$earnings = PlanEarning::all()->where('index', '!=', 0)->where('earned', 1);
		
		return view('dashboard.misc.admin', compact(['scripts', 'clients', 'earnings']));
    }

	public function profile()
	{
		$user = auth()->user();
		$wallets = $user->wallets;
		$scripts = [
			'dashboard/js/plugins/choices.min.js',
			'dashboard/js/plugins/sweetalert.min.js',
			// 'dashboard/js/custom/edit-admin-profile.js',
			'dashboard/js/custom/edit-profile.js'	
		];

		if(is_client()){
			$client = client();
			$plans = $client->plans;
			
			return view('dashboard.misc.profile',compact(['client', 'plans', 'wallets', 'scripts']));
		}else {
			return view('dashboard.misc.profile',compact(['wallets', 'scripts']));
		}
	}

	
    public function admin_profile(){
		$user = auth()->user();
		$admin = Admin::find($user->id);	
	
		$wallets = $admin->wallets;
		$scripts = [
			'dashboard/js/plugins/choices.min.js',
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/edit-admin-profile.js'	
		];
		return view('dashboard.misc.admin-profile',compact(['admin', 'wallets', 'scripts']));
	}
}