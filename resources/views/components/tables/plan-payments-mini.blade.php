<div class="{{ $class }}">
    <div class="card ">
	<div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
                <h6 class="mb-2">Latest Package Earnings</h6>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center ">
		<tbody>
		@foreach ($payments as $payment)
                    <tr>
                	<td class="w-20">
                            <div class="d-flex px-2 py-1 align-items-center">
				<div class="d-none">
                            	    <img src="../../assets/img/icons/flags/US.png" alt="Country flag">
                        	</div>
                            	<div class="ms-4">
                              	    <p class="text-xs font-weight-bold mb-0">Plan:</p>
                              	    <h6 class="text-sm mb-0">{{ $payment->clientPlan->plan_name }}</h6>
                            	</div>
                            </div>
                        </td>
                        <td class="w-20">
                            <div class="text-center">
                            	<p class="text-xs font-weight-bold mb-0">Amount Invested:</p>
                            	<h6 class="text-sm mb-0">{{ $payment->clientPlan->amount }}</h6>
                            </div>
                        </td>
                        <td class="w-20">
                            <div class="text-center">
                        	<p class="text-xs font-weight-bold mb-0">Interest:</p>
                            	<h6 class="text-sm mb-0">{{ dollar($payment->interest) }}</h6>
                            </div>
                        </td>
                        <td class="align-middle text-sm w-20">
                            <div class="col text-center">
                            	<p class="text-xs font-weight-bold mb-0">Date:</p>
                            	<h6 class="text-sm mb-0">{{ readFullDate($payment->planPayDate->pay_date) }}</h6>
                	    </div>
			</td>
		        <td class="align-middle text-sm w-20">
                            <div class="col text-center">
                            	<p class="text-xs font-weight-bold mb-0">Time:</p>
                            	<h6 class="text-sm mb-0">{{ showTime($payment->planPayDate->pay_date) }}</h6>
                	    </div>
			</td>
</tr>
		@endforeach
		</tbody>
	    </table>
	</div>
    </div>
</div>
		

