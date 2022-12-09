<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
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
		$earnings = $client->planEarnings()->get();
		
		return view('dashboard.misc.home', compact(['scripts', 'client', 'earnings']));
    }

	public function profile()
	{
		$user = auth()->user();
		$wallets = $user->wallets;
		$scripts = [
			'dashboard/js/plugins/choices.min.js',
			'dashboard/js/plugins/sweetalert.min.js',
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
    
}