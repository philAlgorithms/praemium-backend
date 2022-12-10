<div class="col-md-8 col-sm-10 mx-auto">
    <form class="" action="index.html" method="post">
        <div class="card my-sm-5" id="invoice">
            <div class="card-header text-center">
		<div class="row justify-content-between">
                    <div class="col-md-4 text-start">
                    	<img class="mb-2 w-25 p-2" src="{{ URL::asset('dashboard/img/logo.png') }}" alt="Logo">
                    	<h6>
		      	    {{ appName() }} Investment
                    	</h6>
                    	<p class="d-block text-secondary">{{ variable('SUPPORT_EMAIL') }}</p>
                    </div>
                    <div class="col-lg-3 col-md-7 text-md-end text-start mt-5">
                    	<h6 class="d-block mt-2 mb-0">User: {{ $subscription->client->name }}</h6>
                    	<p class="text-secondary">{{ $subscription->client->email }}<br>
                      	    {{ $subscription->client->country->nicename ?? 'N/A' }}
                    	</p>
                    </div>
                </div>
                <br>
		<div class="row justify-content-md-between">
		    <div class="col-md-4 mt-auto">
		        <div>
                    	    <h6 class="mb-0 text-start text-secondary">
                	     	Plan Name
                    	    </h6>
                    	    <h6 class="text-start mb-2 text-truncate">
		      		{{ $subscription->plan_name }} package
		    	    </h6>
			</div>
		    	<div>
                    	    <h6 class="mb-0 text-start text-secondary">
                      	    	Transaction Id
                    	    </h6>
                    	    <h5 class="text-start mb-0 text-truncate">
		      	    	{{ $subscription->uuid }}
		    	    </h5>
		    	</div>

            	    </div>
            	    <div class="col-lg-5 col-md-7 mt-auto">
		    	<div class="row mt-md-5 mt-4 text-md-end text-start">
		    	    <div class="col-md-6">
                	    	<h6 class="text-secondary mb-0">Amount:</h6>
                    	    </div>
                    	    <div class="col-md-6">
                	    	<h6 class="text-dark mb-0">{{ dollar($subscription->amount) }}</h6>
                    	    </div>
                    	    <div class="col-md-6">
                            	<h6 class="text-secondary mb-0">Start date:</h6>
                    	    </div>
                    	    <div class="col-md-6">
                            	<h6 class="text-dark mb-0">{{ readFullDate($subscription->created_at) }}</h6>
                    	    </div>
                    	</div>
                    	<div class="row text-md-end text-start">
                    	    <div class="col-md-6">
                	    	<h6 class="text-secondary mb-0">Due date:</h6>
                    	    </div>
                            <div class="col-md-6">
                        	<h6 class="text-dark mb-0">{{ readFullDate($subscription->dueDate()) }}</h6>
                            </div>
                    	</div>
            	    </div>
            	</div>
    	    </div>
    	    <div class="card-body">
                <div class="row">
                    <div class="col-12">
                    	<div class="table-responsive">
                      	    <table class="table text-right">
                        	<thead class="bg-default">
                          	    <tr>
                            		<th scope="col" class="pe-2 text-start ps-2">Time of earning</th>
                            		<th scope="col" class="pe-2">ROI</th>
                            		<th scope="col" class="pe-2" colspan="2">Interest</th>
                            		<th scope="col" class="pe-2"></th>
                          	    </tr>
                        	</thead>
				@if ($subscription->paidEarnings->first() == null)
				    <span class="text-info">You will start earning from this plan on {{ readFullDate($subscription->firstDate()) }} at {{ showTime($subscription->firstDate()) }} GMT</span>
				@endif
				<tbody>
				@foreach ($subscription->paidEarnings as $earning)
                          	    <tr>
                            	    	<td class="text-start">{{ readFullDate($earning->planPayDate->pay_date) }}&nbsp; at &nbsp;<b> {{ showTime($earning->planPayDate->pay_date) }}</b></td>
                            	    	<td class="ps-4">{{ checkFloat($earning->roi) }}%</td>
                            	    	<td class="ps-4" colspan="2">{{ dollar($earning->interest) }}</td>
				    </tr>
				@endforeach
                        	</tbody>
                        	<tfoot>
                          	    <tr>
                            	    	<th></th>
                            		<th class="ps-4" colspan="2">Total Interest</th>
					<th colspan="1" class="text-right h6 ps-4">{{ $subscription->paidEarningsAlt->first() == null ? dollar(0) : dollar($subscription->paidEarningsAlt->first()->cumulative_interest) }}</th>
				    </tr>
				    <tr>
                            	    	<th></th>
                            		<th class="ps-4" colspan="2">Amount Invested</th>
					<th colspan="1" class="text-right ps-4 h6">{{ dollar($subscription->amount) }}</th>
				    </tr>
				    <tr>
                            	    	<th></th>
                            		<th class="h5 ps-4" colspan="2">Total</th>
					<th colspan="1" class="text-right h5 ps-4">{{ $subscription->paidEarningsAlt->first() == null ? dollar($subscription->amount) :dollar($subscription->paidEarningsAlt->first()->cumulative_amount) }}</th>
                          	    </tr>
                        	</tfoot>
                      	    </table>
                    	</div>
                    </div>
                </div>
            </div>
            <div class="card-footer mt-md-5 mt-4">
                <div class="row">
                    <div class="col-lg-5 text-left">
                    	<h5>Thank you!</h5>
                    	    <p class="text-secondary text-sm">If you encounter any issues related to the invoice you can contact us at:</p>
                    	<h6 class="text-secondary mb-0">
                      	    email:
                      	    <span class="text-dark"><a href="mailto:{{ variable('SUPPORT_EMAIL') }}" class="__cf_email__" data-cfemail="bfcccacfcfd0cdcbffdccddadecbd6c9da92cbd6d291dcd0d2">{{ variable('SUPPORT_EMAIL') }}</a></span>
                	</h6>
                    </div>
                    <div class="col-lg-7 text-md-end mt-md-0 mt-3">
                    	<button class="btn bg-gradient-info mt-lg-7 mb-0 d-none" onClick="PrintElem(document.getElementById('invoice'))" type="button" name="button">Print</button>
                    </div>
		</div>
	    </div>
        </div>
    </form>
</div>
