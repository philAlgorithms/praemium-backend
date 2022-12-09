<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DepositController extends Controller
{
    public function subscribe(Request $request){
		$scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/login.js'
		];

		$client = client();
		$plans = Plan::all();
		
		return view('dashboard.deposit.subscribe', compact(['scripts', 'client', 'plans']));
    }
    
}