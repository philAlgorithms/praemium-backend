@component('mail::message')
# Subscription to {{ $param['plan'] }} Package

Dear {{ $param['name'] }},

Your request to subscribe with the amount {{ $param['deposit'] }} has been saved and you will be duly notified once the payment has been received.

Thanks,<br>
{{ appName() }}
@endcomponent
