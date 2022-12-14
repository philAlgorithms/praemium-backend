<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Models\SkillCategory;
use App\Models\client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class RegisterController extends BaseController
{
    public function __invoke()
    {
        $validator = Validator::make(request()->toArray(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        Auth::guard('web')->login($user);
    }

    public function RegisterClient()
    {
        $validator = Validator::make(request()->toArray(), [
            'password' => ['required', 'confirmed', 'min:8', 'regex:'.env('PASSWORD_PATTERN')],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'numeric'],
            'referrer' => ['string', 'nullable']
        ]);

        if($validator->fails()){
            return $this->sendError('Error validation', $validator->errors());
        }

        $data = [
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'country_id' => request('country'),
        ];

        if(request()->session()->has('ref')){
            $referrer = Client::whereId(session('ref')->id);
            if($referrer !== null)
            $data['referrer_id'] = session('ref')->id; 
        }

        $client = User::create($data);
        $client->assignRole('client');

        Auth::guard('web')->login($client);

        $client->send_mail(subject: "Registration Complete", view:"emails.auth.signup", param:['name' => $client->name], bcc: admin_emails());

        return $this->sendResponse($client, "client Registration successful", 201);
    }
}
