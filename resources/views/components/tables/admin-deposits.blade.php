<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
			<th>S/N</th>
			@if(is_admin())
			<th>Client</th>
			@endif
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
						@if(is_admin())
						<td class="font-weight-bold">
							<img src="{{ URL::asset($deposit->transaction->client->avatar) }}" class="avatar avatar-xs me-2" alt="user image">
										<span class="my-2 text-xs">{{ $deposit->transaction->client->name }}</span>
						</td>
						@endif

                    	<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ readFullDate($deposit->transaction->created_at) }}</span>
						</td>

						<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ dollar($deposit->transaction->amount) }}</span>
						</td>
		
                    	<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">
                            	<button class="btn btn-icon-only btn-rounded btn-{{ $deposit->transaction->status->color }} mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="{{ $deposit->transaction->status->icon }}" aria-hidden="true"></i></button>
                        	<span>{{ $deposit->transaction->status->name }}</span>
                            </div>
			</td>
			<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
				<img src="{{ cryptoSvgColor($deposit->transaction->coin->code) }}" class="avatar avatar-xs me-2" alt="user image">
                        	<span class="text-truncate">{{ $deposit->transaction->sender_address }}</span>
                      	    </div>
                    	</td>

                    	<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
				<img src="{{ cryptoSvgColor($deposit->transaction->coin->code) }}" class="avatar avatar-xs me-2" alt="user image">
                        	<span class="text-truncate">{{ $deposit->transaction->receiver_address }}</span>
                      	    </div>
                    	</td>

              		<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ $deposit->transaction->means }}</span>
			</td>
			<td class="text-xs text-center font-weight-bold">
                      	    <a target="_blank" href="{{ $deposit->transaction->tx == null ? 'javascript;' : $deposit->transaction->link() }}" class="my-2 text-x">{{ $deposit->transaction->hash == null ? 'Link unvailable' : 'View on blockchain' }} &nbsp;&nbsp;<i class="fas fa-external-link-alt"></i></a>
			</td>

						<td class="text-xs text-center font-weight-bold">
                      	    <a href="{{ is_admin() ? '/account/admin/deposit/manage/' :  '/account/deposit/view/'}}{{ $deposit->id }}" class="my-2 text-x">More details&nbsp;&nbsp;<i class="fas fa-external-link-alt d-none"></i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
            </table>
		</div>
    </div>
</div>
