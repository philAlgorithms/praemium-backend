<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
			<th>S/N</th>
			<th>From</th>
			<th>to</th>
			<th>Amount</th>
			<th>Charge</th>
			<th>Date</th>
			<th></th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($payments as $i=>$payment)              
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
			 
                        	<span class="text-truncate">{{ $payment->payer->name }}</span>
                      	    </div>
                    	</td>
			<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
			 
                        	<span class="text-truncate">{{ $payment->benefactor->name }}</span>
                      	    </div>
                    	</td>
			<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
			 
                        	<span class="text-truncate">{{ dollar($payment->amount) }}</span>
                      	    </div>
                    	</td>
			<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
			 
                        	<span class="text-truncate">{{ dollar($payment->charge) }}</span>
                      	    </div>
                    	</td>


                    	<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ readFullTime($payment->created_at) }}</span>
			</td>

			<td class="text-xs text-center font-weight-bold d-none">
                      	    <a href="" class="my-2 text-x">More details&nbsp;&nbsp;</i></a>
			</td>
		    </tr>
		@endforeach
		</tbody>
            </table>
	</div>
    </div>
</div>
