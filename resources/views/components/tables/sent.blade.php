<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
                   	<th>S/N</th>
			<th>Date</th>
			<th>Amount</th>
			<th>Charges</th>
                    	<th>Status</th>
			<th>Receiver's Name</th>
			<th>Details</th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($transfers as $i=>$transfer)              
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
                      	    <span class="my-2 text-xs">{{ readFullTime($transfer->created_at) }}</span>
			</td>

			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ dollar($transfer->amount) }}</span>
			</td>
			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ dollar($transfer->charge) }}</span>
			</td>
		

                    	<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">
                            	<button class="btn btn-icon-only btn-rounded btn-{{ $transfer->status->color }} mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="{{ $transfer->status->icon }}" aria-hidden="true"></i></button>
                        	<span>{{ $transfer->status->name }}</span>
                            </div>
			</td>
			<td class="text-xs font-weight-bold w-50">
			    <div class="d-flex align-items-center">
				<img src="{{ avatar($transfer->receiver->avatar) }}" class="avatar avatar-xs me-2" alt="user image">
				<span class="text-truncate">{{ $transfer->receiver->name }}</span>	
                      	    </div>
                    	</td>
<td class="text-xs text-center font-weight-bold">
                      	    <a href="transfer-sent-{{ $transfer->uuid }}" class="my-2 text-x">More details&nbsp;&nbsp;</i></a>
			</td>
		    </tr>
		@endforeach
		</tbody>
            </table>
	</div>
    </div>
</div>
