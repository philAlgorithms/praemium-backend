<div class="col-lg-11 mt-5 mx-auto">
    <div class="card mb-4">
        <div class="card-header p-3 pb-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6>Withdrawal Details</h6>
			<p class="text-sm mb-0">
			    Blockchain hash: <b>{{ $withdrawal->transaction->hash ?? 'N/A' }}</b>
			</p>
			<p class="text-sm">
                      	    Transaction id: <b>{{ $withdrawal->transaction->uuid }}</b>
                  	</p>
                    </div>
                    <a href="javascript:;" class="btn bg-gradient-secondary ms-auto mb-0 d-none">Invoice</a>
              	</div>
            </div>
            <div class="card-body p-3 pt-0">
              	<hr class="horizontal dark mt-0 mb-4">
              	<div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                  	<div class="d-flex">
                    	    <div>
                    		<img src="{{ cryptoSvgColor($withdrawal->transaction->coin->code) }}" class="avatar avatar-xxl me-3" alt="product image">
                	    </div>
                	    <div>
				<h6 class="text-lg mb-0 mt-2">{{ $withdrawal->transaction->coin->display_name }} withdrawal</h6>
				<p class="text-sm mb-3">{{ $withdrawal->transaction->status->key == env('STATUS_SUCCESSFUL') ? 
	'Deposit was confirmed '.$withdrawal->transaction->updated_at :
	($withdrawal->transaction->status->key == env('STATUS_PENDING') ? 
		'Awaiting transaction' :
		($deposit->transaction->status->key == env('STATUS_PROCESSING') ? 'Transaction processing' : 'Request is declined')) }}</p>          		
				<span class="badge badge-sm bg-gradient-{{ $withdrawal->transaction->status->color }}">{{ $withdrawal->transaction->status->name }}</span>
                    	    </div>
            		</div>
	    	    </div>
            	    {{ $slot }}
              	</div>
              	<hr class="horizontal dark mt-4 mb-4">
              	<div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                  	<h6 class="mb-3">Transaction details</h6>
                  	<div class="timeline timeline-one-side">
                    	    <div class="timeline-block mb-3">
                      		<span class="timeline-step">
                        	    <i class="ni ni-bell-55 text-secondary"></i>
                      		</span>
                      		<div class="timeline-content">
                        	    <h6 class="text-dark text-sm font-weight-bold mb-0">Request received</h6>
                        	    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ readFullTime($withdrawal->transaction->created_at) }}</p>
                      		</div>
                    	    </div>
                    	    <div class="timeline-block mb-3">
                      		<span class="timeline-step">
                        	    <i class="cf cf-{{ $withdrawal->transaction->coin->code }}"></i>
                      		</span>
                      	        <div class="timeline-content">
                        	    <h6 class="text-dark text-sm font-weight-bold mb-0">Receiver Address</h6>
                        	    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0 text-truncate">{{ $withdrawal->transaction->receiver_address }}</p>
				</div>
			        <div class="timeline-block mb-3">
                      		    <span class="timeline-step">
                        	        <i class="cf cf-{{ $withdrawal->transaction->coin->code }}"></i>
                      		    </span>
                      		<div class="timeline-content">
                        	    <h6 class="text-dark text-sm font-weight-bold mb-0">Sender Address</h6>
                        	    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0 text-truncate">{{ $withdrawal->transaction->status->name == 'Successful' ? $withdrawal->transaction->sender_address : 'N/A' }}</p>
                      	    	</div>

                    	    </div>
                    	    <div class="timeline-block mb-3">
                      	    	<span class="timeline-step">
				<span class="btn-inner--icon"><img id="trust-img" class="w-100 me- mb-0" src="{{ cryptoSvg('trust') }}" alt="logo"></i></span>
                      	    	</span>
                      	    	<div class="timeline-content">
                            	    <h6 class="text-dark text-sm font-weight-bold mb-0">Exchange</h6>
                            	    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $withdrawal->transaction->status->name == 'Successful' ? $withdrawal->transaction->status->means : 'N/A'}}</p>
                      	    	</div>
                    	    </div>
                    	    <div class="timeline-block mb-3">
                      	    	<span class="timeline-step">
			<span class="btn-inner--icon"><img id="trust-img" class="w-80 me- mb-" src="{{ URL::asset('img/blockchain.png') }}"></span>
                      	    	</span>
                      	    	<div class="timeline-content">
                        	    <h6 class="text-dark text-sm font-weight-bold mb-0">Blockchain proof</h6>
                        	    <p href="{{ $withdrawal->transaction->hash !== null ? $withdrawal->transaction->link() : 'javascript;'}}" class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $withdrawal->transaction->hash !== null ? 'View transaction' : 'Link unavailable'}}</p>
                      	    	</div>
                    	    </div>
                    	</div>
		    </div>
	        </div>
                <div class="col-lg-5 col-md-6 col-12">
                    <h6 class="mb-3">Payment details</h6>
		    <x-general.wallet :coin="$withdrawal->transaction->coin" :address="$withdrawal->transaction->receiver_address">
			<i class="fas fa-clipboard ms-auto text-dark cursor-pointer" id="" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard"></i>
		    </x-general.wallet>
			 
                  	<h6 class="mb-3 mt-4">User Information</h6>
                	<ul class="list-group">
                    	    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      		<div class="d-flex flex-column">
                        	    <h6 class="mb-3 text-sm">{{ $withdrawal->transaction->client->name }}</h6>
                        	    <span class="mb-2 text-xs">Location: <span class="text-dark font-weight-bold ms-2">{{ $withdrawal->transaction->client->country->nicename ?? 'N/A' }}</span></span>
                        	    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-2 font-weight-bold"><a href="mailto:{{ $withdrawal->transaction->client->email }}" class="__cf_email__" data-cfemail="1b7477726d7e695b796e6969726f7435787476">{{ $withdrawal->transaction->client->email }}</a></span></span>
                        	    <span class="text-xs d-none">VAT Number: <span class="text-dark ms-2 font-weight-bold">FRB1235476</span></span>
                      	    	</div>
		    	    </li>
                  	</ul>
                    </div>
                    <div class="col-lg-3 col-12 ms-auto">
                  	<h6 class="mb-3">Request Summary</h6>
                  	<div class="d-flex justify-content-between">
                    	    <span class="mb-2 text-sm">
                      		Withdrawal amount:
                    	    </span>
                    	    <span class="text-dark font-weight-bold ms-2">{{ dollar($withdrawal->transaction->amount) }}</span>
                  	</div>
                  	<div class="d-flex justify-content-between">
                    	    <span class="mb-2 text-sm">
                      		Charges:
                    	    </span>
                    	    <span class="text-dark ms-2 font-weight-bold">-{{ dollar($withdrawal->transaction->charge) }}</span>
                  	</div>
                  	<div class="d-flex justify-content-between mt-4">
                    	    <span class="mb-2 text-lg">
                      		Total:
                    	    </span>
                    	    <span class="text-dark text-lg ms-2 font-weight-bold">{{ dollar($withdrawal->transaction->amount - $withdrawal->transaction->charge) }}</span>
                  	</div>
                    </div>
              	</div>
            </div>
	</div>
    </div>
</div>
