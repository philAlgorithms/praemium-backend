@component('mail::message')
# Earnings Withdrawals

Dear {{ $param['name'] }},

Your withdrawal of {{ $param['amount'] }} has been confirmed. 

Thanks,<br>
{{ appName() }}
@endcomponent
