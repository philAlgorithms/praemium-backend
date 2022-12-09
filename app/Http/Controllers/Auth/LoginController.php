<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

class LoginController extends BaseController
{
    public function __invoke()
    {
        request()->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ]);

        return $this->authenticate();
    }

    private function authenticate()
    {
        if (!Auth::guard('web')
            ->attempt(
                request()->only('email', 'password'),
                request()->boolean('remember')
            )) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }else {
            $link = User::find(auth()->user()->id)->hasRole('admin') ? '/account/admin' : '/account';
            return [
                "dashboard" => $link
            ];
        }
    }
}
