@component('mail::message')
# Reset Password

You can reset password from bellow link:
<a href="{{ route('reset.password.get', $details['token']) }}">Reset Password</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
