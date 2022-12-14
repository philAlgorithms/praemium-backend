@component('mail::message')
# Registration at {{ appName() }} completed

{{ $param['name'] }},

Thanks for signing up with {{ config('app.name') }}. We are commited to serving you better with the best rates in the market as you invest with us.
Sign in now and invest in our profitable packages.

Thanks,<br>
{{ appName() }}
@endcomponent
