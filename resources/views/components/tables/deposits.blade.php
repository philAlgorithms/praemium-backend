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
			<th>Blockchain Proof</th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($deposits as $i=>$deposit)              
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
                      	    <span class="my-2 text-xs">{{ readFullDate($deposit->created_at) }}</span>
			</td>

			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ dollar($deposit->amount) }}</span>
			</td>
		
                    	<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">
                            	<button class="btn btn-icon-only btn-rounded btn-{{ $deposit->status->color }} mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="{{ $deposit->status->icon }}" aria-hidden="true"></i></button>
                        	<span>{{ $deposit->status->name }}</span>
                            </div>
			</td>
			<td class="text-xs font-weight-bold w-50">
			    <div class="d-flex align-items-center">
				<img src="{{ cryptoSvgColor($deposit->benefactorWallet->coin->code) }}" class="avatar avatar-xs me-2 {{ $deposit->sender_address == null ? 'd-none' : '' }}" alt="user image">
				<span class="text-truncate">{{ $deposit->sender_address ?? 'N/A' }}</span>	
                      	    </div>
                    	</td>

                    	<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
				<img src="{{ cryptoSvgColor($deposit->benefactorWallet->coin->code) }}" class="avatar avatar-xs me-2" alt="user image">
                        	<span class="text-truncate">{{ $deposit->benefactorWallet->address }}</span>
                      	    </div>
                    	</td>

              		<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ $deposit->means ?? 'N/A' }}</span>
			</td>
			<td class="text-xs text-center font-weight-bold">
                      	    <a target="{{ $deposit->isVerified() ? '_blank' : '' }}" href="{{ $deposit->hash == null ? 'javascript;' : $deposit->link() }}" class="my-2 text-x">{{ $deposit->hash !== null ? 'View on blockchain' : 'Link unavailable' }}&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i></a>
			</td>
			<td class="text-xs text-center font-weight-bold">
                      	    <a href="deposit-{{ $deposit->uuid }}" class="my-2 text-x">More details&nbsp;&nbsp;<i class="fas fa-external-link-alt d-none"></i></a>
			</td>
		    </tr>
		@endforeach
		</tbody>
            </table>
	</div>
    </div>
</div>
