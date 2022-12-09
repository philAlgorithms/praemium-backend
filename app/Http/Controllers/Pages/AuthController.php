<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request){
		$scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/login.js'
		];
		return view('dashboard.auth.login', compact('scripts'));
    }
    
}