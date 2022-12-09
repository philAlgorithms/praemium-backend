<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
                   	<th>S/N</th>
			<th>Name</th>
			<th>Email</th>
			<th>Location</th>
                    	<th>Total Deposits</th>
			<th>Total Withdrawals</th>
			<th>Total Referral Bonus</th>
                	<th>Joined</th>
			<th></th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($clients as $i=>$client)              
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
			    <img src="{{ URL::asset($client->avatar) }}" class="avatar avatar-xs me-2" alt="user image">
                      	    <span class="my-2 text-xs">{{ $client->name }}</span>
			</td>
			
			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ $client->email }}</span>
			</td>
		

			<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ $client->country->nicename }}</span>
			</td>
		
                    	<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">	
                        	<span>{{ $client->status->name ?? 'N/A'}}</span>
                            </div>
			</td>
			<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
				
                        	<span class="text-truncate">{{ $client->sender_address ?? 'N/A'}}</span>
                      	    </div>
                    	</td>

                    	<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
				<img src="" class="avatar avatar-xs me-2 d-none" alt="user image">
                        	<span class="text-truncate">{{ $client->benefactorWallet->wallet_address ?? 'N/A' }}</span>
                      	    </div>
                    	</td>

              		<td class="text-xs text-center font-weight-bold">
                      	    <span class="my-2 text-x">{{ readFullDate($client->created_at) }}</span>
			</td>
			<td class="text-xs text-center font-weight-bold">
                      	    <a href="/profile-{{ $client->uuid }}" class="my-2 text-x">View Client</a>
			</td>

		    </tr>
		@endforeach
		</tbody>
            </table>
	</div>
    </div>
</div>
