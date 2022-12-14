@component('mail::message')
# {{ $param['title'] }}

{{ $param['body'] }}

Thanks,<br>
{{ appName() }}
@endcomponent
