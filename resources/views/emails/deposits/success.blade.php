@component('mail::message')
# Subscription to {{ $param['plan'] }} Package

Dear {{ $param['name'] }},

Your deposit of {{ $param['deposit'] }} has been confirmed and you have been duly subscribed to {{ $param['plan'] }} Package. 

Thanks,<br>
{{ appName() }}
@endcomponent
