@component('mail::message')
# Earnings Withdrawal

Dear {{ $param['name'] }},

Your request to withdraw the amount {{ $param['amount'] }} has been saved and you will be duly notified once the payment has been approved.

Thanks,<br>
{{ appName() }}
@endcomponent
