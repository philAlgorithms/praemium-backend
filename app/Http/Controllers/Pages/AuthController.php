<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Country;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends BaseController
{
    public function login(Request $request){
		$scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/login.js'
		];
		return view('dashboard.auth.login', compact('scripts'));
    }
    
	public function register(Request $request){
		if($request->exists('ref')){
			$referrer = User::role('client')->firstWhere('username', '=', $request->ref);
			if($referrer !== null)
				$request->session()->put(['ref' => $referrer]);
		}
		$scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/auth/signup.js',
		];
		return view('dashboard.auth.signup', compact(['scripts']));
	}

	/**
	 * RESET PASSWORD START
	 */
	public function forgot(Request $request)
    {
		$countries = Country::all();

		$scripts = [
			'dashboard/js/plugins/choices.min.js',
			'dashboard/js/plugins/sweetalert.min.js',	    
			'dashboard/js/custom/forgot-password.js'
		];
		return view('dashboard.auth.password.forgot', compact(['countries', 'scripts']));
    }

	public function submitForgetPasswordForm(Request $request)
    {
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|exists:users',
		]);

		if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

		$token = Str::random(64);

		DB::table('password_resets')->insert([
			'email' => $request->email, 
			'token' => $token, 
			'created_at' => Carbon::now()
		]);

		$details = ['token' => $token];
		Mail::to($request->email)
			->send(new \App\Mail\Password\Forgot($details));

		return $this->sendResponse([], 'Reset link has been mailed to you');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token) {
		$scripts = [
			'dashboard/js/plugins/sweetalert.min.js',
			'dashboard/js/custom/reset-password.js'
		];	
		return view('dashboard.auth.password.forgot-link', compact(['token', 'scripts']));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
		$validator = Validator::make($request->all(),[
			'email' => 'required|email|exists:users',
				'password' => ['required', 
				'min:8', 
				'regex:'.env('PASSWORD_PATTERN')
			],
			'confirm_password' => 'required|same:password',

		]);

		if($validator->fails()){
			return $this->sendError('Error validation', $validator->errors());
		}

		$updatePassword = DB::table('password_resets')->where(['email' => $request->email, 
			'token' => $request->token
		])->first();

		if(!$updatePassword){
			return $this->sendError('Error validation', "Invalid token", 403, "unauthenticated");
		}

		$user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

		DB::table('password_resets')->where(['email'=> $request->email])->delete();

		return $this->sendResponse([], 'Password succesfully changed. Redirecting you');
    }
	/**
	 * RESET PASSWORD END
	 */
}