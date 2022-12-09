<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
			<th>S/N</th>
			<th>Plan name</th>
			<th>Date Subscribed</th>
			<th>Amount Invested</th>
			<th>Cumulative Interest</th>
			<th>Total Earning</th>
                    	<th>Status</th>
			<th>More</th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($subscriptions as $i=>$subscription)              
		    <tr>
                    	<td>
                      	    <div class="d-flex align-items-center">
                        	<div class="form-check">
                          	    <input class="form-check-input" type="checkbox" id="customCheck1">
                  	    	</div>
                            	<p class="text-xs font-weight-bold ms-2 mb-0">{{ $i+1 }}</p>
                	    </div>
			</td>

			<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
                        	<span class="text-truncate">{{ $subscription->plan_name }}</span>
                      	    </div>
                    	</td>

                    	<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
			
                        	<span class="text-truncate">{{ readFullDate($subscription->created_at) }}</span>
                      	    </div>
                    	</td>
			
			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ dollar($subscription->amount) }}</span>
			</td>
			
			<td class="font-weight-bold">
			@if ($subscription->earnings->first() != null)
			    <span class="my-2 text-xs">{{ dollar($subscription->earnings->first()->cumulative_interest) ?? dollar(0) }}</span>
			@else
			    <span class="my-2 text-xs">{{ dollar(0) }}</span>
			@endif
			</td>

			<td class="text-xs text-center font-weight-bold">
			@if ($subscription->earnings->first() != null)
			    <span class="my-2 text-x">{{ dollar($subscription->earnings->first()->cumulative_amount) ?? dollar($subscription->amount) }}</span>
			@else
			    <span class="my-2 text-x">{{ dollar($subscription->amount) }}</span>
			@endif
			</td>
			<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">
                            	<button class="btn btn-icon-only btn-rounded btn-{{ statusIndicator($subscription->active) }} mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="{{ statusIcon($subscription->active) }}" aria-hidden="true"></i></button>
                        	<span>{{ $subscription->active ? 'Active' : 'Expired' }}</span>
                            </div>
			</td>

              		<td class="text-xs text-center font-weight-bold">
                      	    <a href="/subscription-{{ $subscription->uuid }}" class="my-2 text-x">More Details &nbsp;&nbsp;<i class="fas fa-external-link-alt"></i></a>
			</td>

		    </tr>
		@endforeach
		
		</tbody>
            </table>
	</div>
    </div>
</div>
