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
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class RegisterController extends BaseController
{
    public function __invoke()
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        Auth::guard('web')->login($user);
    }

    public function RegisterClient()
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%_\(\)\*\?]).*$/'],
            'country' => ['required', 'numeric'],
        ]);

        $client = User::create([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'country_id' => request('country'),
        ]);
        $client->assignRole('client');

        Auth::guard('web')->login($client);

        return $this->sendResponse($client, "client Registration successful", 201);
    }
}
