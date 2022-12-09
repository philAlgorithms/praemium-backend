<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
			<th>S/N</th>
			<th>Interest earned</th>
			<th>Date Earned</th>
			<th>Time</th>
			<th>Package</th>
			<th>Subscribed</th>
                    	<th>Principal</th>
			<th>More</th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($earnings as $i=>$earning)              
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
                        	<span class="text-truncate">{{ dollar($earning->interest) }}</span>
                      	    </div>
                    	</td>

                    	<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
			
                        	<span class="text-truncate">{{ readFullDate($earning->planPayDate->pay_date) }}</span>
                      	    </div>
                    	</td>
			
			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ showTime($earning->planPayDate->pay_date) }}</span>
			</td>
			
                    	<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ $earning->clientPlan->plan_name }} Plan</span>
			</td>

			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ readFullDate($earning->clientPlan->created_at) }}</span>
			</td>
		
                    	<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">
                        	<span>{{ dollar($earning->clientPlan->amount) }}</span>
                            </div>
			</td>
              		<td class="text-xs text-center font-weight-bold">
                      	    <a target="_blank" href="" class="my-2 text-x">More Details &nbsp;&nbsp;<i class="fas fa-external-link-alt"></i></a>
			</td>
		    </tr>
		@endforeach
		</tbody>
		<tfoot>
		    <th>
			<th>S/N</th>                                               <th>Interest earned</th>                                   <th>Date Earned</th>                                       <th>Time</th>                                              <th>Package</th>                                           <th>Subscribed</th>                                        <th>Principal</th>                                         <th>More</th>
		    </th>
		</tfoot>
            </table>
	</div>
    </div>
</div>
