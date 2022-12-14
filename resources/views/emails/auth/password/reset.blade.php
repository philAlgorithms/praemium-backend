@component('mail::message')
# <u>{{ appName() }}: Password Reset Link</u>

Click on the URL below to reset your password<br/>
Reset <a href="{{ $param['url'] }}">My Password</a><br/><br/>
Kindly ignore this mail if this request is not from you<br></br>

Best Wishes,<br/>
<b>{{ appName() }} Team</b>
@endcomponent
