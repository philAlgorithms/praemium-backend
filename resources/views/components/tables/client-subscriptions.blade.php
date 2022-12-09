<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
                   	<th>S/N</th>
			<th>Plan</th>
			<th>Cost</th>
			<th>Interest</th>
			<th>Active</th>
			<th>Start Date<th>
			<th>Total Earned</th>
			<th></th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($plans as $i=>$plan)              
		    <tr>
                    	<td>
                      	    <div class="d-flex align-items-center">
                        	<div class="form-check">
                          	    <input class="form-check-input" type="checkbox" id="customCheck1">
                  	    	</div>
                            	<p class="text-xs font-weight-bold ms-2 mb-0">{{ $i+1 }}</p>
                	    </div>
			</td>
			
			<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ $plan->plan->name ?? $plan->plan_name }}</span>
			</td>

			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ dollar($plan->amount) }}</span>
			</td>
		
			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ checkFloat($plan->plan->roi) ?? checkFloat($plan->roi )}}%</span>
			</td>
	
			<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ $plan->active ? 'Yes' : 'No' }}</span>
			</td>
			

                    	<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ readFullDate($plan->created_at) }}</span>
			</td>
			
			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">N/A</span>
			</td>
		
			<td class="text-xs text-center font-weight-bold">
                      	    <a target="_blank" href="subscription-{{ $plan->uuid }}" class="my-2 text-x">View Earning history &nbsp;&nbsp;<i class="fas fa-external-link-alt"></i></a>
			</td>

		    </tr>
		@endforeach
		</tbody>
            </table>
	</div>
    </div>
</div>
