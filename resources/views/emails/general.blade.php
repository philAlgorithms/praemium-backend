@component('mail::message')
# {{ $param['header'] }}

Dear {{ $param['name'] }},

You made the following request 

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
