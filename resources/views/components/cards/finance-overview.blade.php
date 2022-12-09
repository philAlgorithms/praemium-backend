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
                    	<h6 class="d-block mt-2 mb-0">User: {{ $finance->client->name }}</h6>
                    	<p class="text-secondary">{{ $finance->client->email }}<br>
                      	    {{ $finance->client->country->nicename }}
                    	</p>
                    </div>
                </div>
                <br>
		<div class="row justify-content-md-between">
		    <div class="col-md-4 mt-auto">
		        <div>
                    	    <h6 class="mb-0 text-start text-secondary">
                	     	Transaction overview
                    	    </h6>
                    	    <h6 class="text-start mb-2 text-truncate">
		      		{{ $finance->plan_name }} 
		    	    </h6>
			</div>
		    	<div>
                    	    <h6 class="mb-0 text-start text-secondary">
                      	    	Transaction Id
                    	    </h6>
                    	    <h5 class="text-start mb-0 text-truncate">
		      	    	{{ $finance->uuid }}
		    	    </h5>
		    	</div>

            	    </div>
            	    <div class="col-lg-5 col-md-7 mt-auto">
		    	<div class="row mt-md-5 mt-4 text-md-end text-start">
		    	    <div class="col-md-6">
                	    	<h6 class="text-secondary mb-0">Amount:</h6>
                    	    </div>
                    	    <div class="col-md-6">
                	    	<h6 class="text-dark mb-0">{{ dollar($finance->amount) }}</h6>
                    	    </div>
                    	    <div class="col-md-6">
                            	<h6 class="text-secondary mb-0">Last updated:</h6>
                    	    </div>
                    	    <div class="col-md-6">
                            	<h6 class="text-dark mb-0">{{ readFullDate($finance->updated_at) }}</h6>
                    	    </div>
                    	</div>
                    	<div class="row text-md-end text-start d-none">
                    	    <div class="col-md-6">
                	    	<h6 class="text-secondary mb-0"></h6>
                    	    </div>
                            <div class="col-md-6">
                        	<h6 class="text-dark mb-0"></h6>
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
                            		<th scope="col" class="pe-2 text-start ps-2"></th>
                            		<th scope="col" class="pe-2"></th>
                            		<th scope="col" class="pe-2" colspan="2">Amount</th>
					<th scope="col" class="pe-2">Charges</th>
					<th scope="col" class="pe-2" colspan="2">Net Amount</th>
                          	    </tr>
                        	</thead>

				<tbody>
                          	    <tr>
                            	    	<td class="text-start">Total Deposits</b></td>
                            	    	<td class="ps-4"></td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_deposits) }}</td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_deposit_charges) }}</td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_deposits - $finance->total_deposit_charges) }}</td>
				    </tr>
				    <tr>
                            	    	<td class="text-start">Total Transfer received</b></td>
                            	    	<td class="ps-4" colspan="2"></td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_received) }}</td>
					<td class="ps-4"></td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_received) }}</td>
				    </tr>
				    <tr>
                            	    	<td class="text-start">Total Transfer sent</b></td>
                            	    	<td class="ps-4"></td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_transfers) }}</td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_transfer_charges) }}</td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_transfers + $finance->total_transfer_charges) }}</td>
				    </tr>
				    <tr></tr>
			    	    <tr>
                            	    	<td class="text-start">Total Plan Subscriptions</b></td>
                            	    	<td class="ps-4"></td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_plan_subscriptions) }}</td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_plan_charges) }}</td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_plan_subscriptions + $finance->total_plan_charges) }}</td>
				    </tr>

                        	</tbody>
                        	<tfoot>
                          	    <tr>
					<th></th>
					<th></th>
                            		<th class="ps-4" colspan="2">{{ dollar(current_total_deposit($finance)) }}</th>
					<th class="ps-4" colspan="2" class="text-right h6 ps-4">-{{ dollar(current_total_deposit($finance) - $finance->current_funding_balance) }}</th>
					<th class="ps-4" colspan="2" class="text-right h6 ps-4">{{ dollar($finance->current_funding_balance) }}</th>
				    </tr>
				    
				    <tr>
                            	    	<th></th>
                            		<th class="ps-4" colspan="2"></th>
					<th colspan="1" class="text-right ps-4 h6"></th>
					<th class="ps-4" colspan="2"></th>
					<th class="ps-4" colspan="2">Current deposit balance</th>
				    </tr>
				    <tr>
                            	    	<th></th>
                            		<th class="h5 ps-4" colspan="2"></th>
					<th colspan="1" class="text-right h5 ps-4"></th>
                          	    </tr>
                        	</tfoot>
                      	    </table>
                    	</div>
		    </div>
		    <div class="col-12">
                    	<div class="table-responsive">
                      	    <table class="table text-right">
                        	<thead class="bg-default">
                          	    <tr>
                            		<th scope="col" class="pe-2 text-start ps-2"></th>
                            		<th scope="col" class="pe-2"></th>
                            		<th scope="col" class="pe-2" colspan="2">Amount</th>
					<th scope="col" class="pe-2">Charges</th>
					<th scope="col" class="pe-2" colspan="2">Net Amount</th>
                          	    </tr>
                        	</thead>

				<tbody>
                         	    <tr>
                            	    	<td class="text-start">Total Plan Subscriptions</b></td>
                            	    	<td class="ps-4"></td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_plan_subscriptions) }}</td>
					<td class="ps-4" colspan="2">Does not suffice</td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_plan_subscriptions) }}</td>
				    </tr>
				    <tr>
                            	    	<td class="text-start">Total Plan Interests</b></td>
                            	    	<td class="ps-4"></td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_plan_interests) }}</td>
					<td class="ps-4" colspan="2"></td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_plan_interests) }}</td>
				    </tr>
				    
				    <tr>
                            	    	<td class="text-start">Total Referral Earnings</b></td>
                            	    	<td class="ps-4"></td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_referral_bonus) }}</td>
					<td class="ps-4" colspan="2"></td>
					<td class="ps-4" colspan="2">{{ dollar($finance->total_referral_bonus) }}</td>
				    </tr>
			    	    <tr>
                            	    	<td class="text-start">Total Referrer Payments</b></td>
                            	    	<td class="ps-4"></td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_referral_payments) }}</td>
					<td class="ps-4" colspan="2"></td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_referral_payments - $finance->total_referral_charges) }}</td>
				    </tr>
				    <tr></tr>
	    	    		    <tr>
                            	    	<td class="text-start">Total Withdrawals</b></td>
                            	    	<td class="ps-4"></td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_withdrawals) }}</td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_withdrawal_charges) }}</td>
					<td class="ps-4" colspan="2">-{{ dollar($finance->total_withdrawals + $finance->total_withdrawal_charges) }}</td>
				    </tr>
				    
			    	</tbody>
                        	<tfoot>
                          	    <tr>
					<th></th>
					<th></th>
                            		<th class="ps-4" colspan="2">{{ dollar(current_total_earning($finance)) }}</th>
					<th class="ps-4" colspan="2" class="text-right h6 ps-4">-{{ dollar($finance->total_withdrawal_charges) }}</th>
					<th class="ps-4" colspan="2" class="text-right h6 ps-4">{{ dollar($finance->current_earning_balance) }}</th>
				    </tr>
				    
				    <tr>
                            	    	<th></th>
                            		<th class="ps-4" colspan="2"></th>
					<th colspan="1" class="text-right ps-4 h6"></th>
					<th class="ps-4" colspan="2"></th>
					<th class="ps-4" colspan="2">Current Earning balance</th>
				    </tr>
				    <tr>
                            	    	<th></th>
                            		<th class="h5 ps-4" colspan="2"></th>
					<th colspan="1" class="text-right h5 ps-4"></th>
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
			    <p class="text-info text-sm">PS: Withdrawable balance is {{ checkFloat(variable('GENERAL_WITHDRAWABLE')) }}% of the current earning balance.</p>
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
