<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;

use App\Models\Client;
use App\Models\Admin;
use App\Models\PasswordReset;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class PasswordController extends BaseController
{
    public function forgot(Request $request)
    {
		$validator = Validator::make($request->all(), [
			'email' => 'required|email',
		]);

		if($validator->fails()){
			return $this->sendError('Error validation', $validator->errors());
		}

		$email = $request->email;

		$admin_exists = Admin::firstWhere('email', '=', $email) !== null;
		$client_exists = Client::firstWhere('email', '=', $email) !== null;

		$email_exists = $admin_exists or $client_exists;
		if($email_exists)
		{
				$token = Str::random(64);

				$reset = PasswordReset::create([
				'email' => $email, 
				'token' => $token
			]);

			$email_param = [
			'url' => URL::to('/password/reset?token='.$reset->token)
			];
			email(param:$email_param, subject: 'Password reset link', view:'emails.auth.password.reset', target:$email);

			return $this->sendResponse($reset, 'Reset link has been mailed to you');
		}

		return $this->sendError('Error querying', "Invalid Email. User not found", 503, "null");
    }

    public function resetPassword(Request $request)
    {
	$validator = Validator::make($request->all(), [
	    'confirm_password' => 'required|same:password',
	    'password' => ['required', 
	    'min:8', 
	    'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%_\(\)\*\?]).*$/'],
	    'token' => 'string|required',
	]);

	if($validator->fails()){
	    return $this->sendError('Error validation', $validator->errors());
	}

	$reset = PasswordReset::firstWhere('token', '=', $request->token);
	if(is_null($reset))
	    return $this->sendError('Error querying', "Token invalid or expired", 403, "forbidden");
	$user = Client::firstWhere('email', $reset->email);
	$user = is_null($user) ? Admin::firstWhere('email', $reset->email) : $user;
	if(is_null($user))
	    return $this->sendError('Error querying', "User not found", 403, "forbidden");

	if($user->update(['password' => Hash::make($request->password)]))
	{
	    DB::table('password_resets')->where(['email'=> $reset->email])->delete();

	    $notification = [
		'title'=>'Password',
		'admin_title'=>'Password',
		'text'=>'Your password was reset',
		'admin_text'=>'Your password was reset',
		'url'=>'/profile',
		'admin_url'=>'/admin/profile',
		'icon'=>'fas fa-lock',
		'color'=>'dark'
	    ];

	    notify($user, $notification);
	    return $this->sendResponse([], 'Password reset successfully.');
	}
	return $this->sendError('Error querying', "Unable to update password. Try again later.", 403, "forbidden");
    }

    public function change(Request $request)
    {
		$validator = FacadesValidator::make($request->all(), [
			'confirm_password' => 'required|same:new_password',
			'new_password' => ['required', 
				'min:8', 
				'regex:'.env('PASSWORD_PATTERN')
			],
			'current_password' => ['required', 'string'],
		]);

		if($validator->fails()){
			return $this->sendError('Error validation', $validator->errors());
		}

		$user = User::find(auth()->user()->id);

		if(Hash::check($request->current_password, $user->password)){
			if($user->update(['password' => Hash::make($request->new_password)]))
			{
			$notification = [
				'title'=>'Password',
				'text'=>'Your password was changed',
				'url'=>'/profile#security',
				'icon'=>'fas fa-lock',
				'color'=>'dark'
			];

			notify($user, $notification);
			return $this->sendResponse([], 'Password reset successfully.');
			}
			return $this->sendError('Error querying', "Unable to update password. Try again later.", 403, "forbidden");
		}
		return $this->sendError('Error authenticating', "Invalid password", 403, "forbidden");

    }
}
