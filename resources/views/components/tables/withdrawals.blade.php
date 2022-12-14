<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
                    	<th>S/N</th>
			<th>Date</th>
			<th>Amount</th>	
			<th>Status</th>
			<th>Sender Address</th>
                    	<th>Receiver Address</th>
			<th>Exchange</th>
			<th>Proof</th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($withdrawals as $i=>$withdrawal)              
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
                      	    <span class="my-2 text-xs">{{ readFullDate($withdrawal->created_at) }}</span>
			</td>

                    	<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ dollar($withdrawal->amount) }}</span>
			</td>

                    	<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">
                            	<button class="btn btn-icon-only btn-rounded btn-{{ $withdrawal->transaction->status->color }} mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="{{ $withdrawal->transaction->status->icon }}" aria-hidden="true"></i></button>
                        	<span>{{ $withdrawal->transaction->status->name }}</span>
                            </div>
			</td>

			<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">
				<img src="{{ cryptoSvgColor($withdrawal->transaction->coin->code) }}" class="avatar avatar-xs me-2" alt="user image">
                        	<span>{{ $withdrawal->sender_address }}</span>
                      	    </div>
                    	</td>


                    	<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">
				<img src="{{ cryptoSvgColor($withdrawal->transaction->coin->code) }}" class="avatar avatar-xs me-2" alt="user image">
                        	<span>{{ $withdrawal->transaction->address }}</span>
                      	    </div>
                    	</td>
			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ $withdrawal->means }}</span>
			</td>
			<td class="text-xs text-center font-weight-bold">
                      	    <a target="_blank" href="{{ $withdrawal->hash == null ? 'javascript;' : $withdrawal->link() }}" class="my-2 text-x">{{ $withdrawal->hash !== null ? 'View on blockchain' : 'Link unavailable' }}&nbsp;&nbsp;<i class="fas fa-external-hash-alt"></i></a>
			</td>

			<td class="text-xs text-center font-weight-bold">
                      	    <a href="withdrawal-{{ $withdrawal->uuid }}" class="my-2 text-x">More details&nbsp;&nbsp;<i class="fas fa-external-link-alt d-none"></i></a>
			</td>
		    </tr>
		@endforeach
		</tbody>
            </table>
	</div>
    </div>
</div>
