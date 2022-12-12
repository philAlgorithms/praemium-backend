<div class="col-lg-11 mx-auto">
    <div class="card mb-4">
        <div class="card-header p-3 pb-0">
            <div class="d-flex justify-content-between align-items-center">
                <div class="w-100">
                    <h6>Deposit Details</h6>
			<p class="text-sm mb-0 w-100 text-truncate">
			    Blockchain hash: <b class="">{{ $deposit->transaction->tx ?? 'N/A' }}</b>
			</p>
			<p class="text-sm text-truncate">
                      	    Transaction id: <b>{{ $deposit->transaction->uuid ?? '' }}</b>
                  	</p>
                    </div>
                    <a href="javascript:;" class="btn bg-gradient-secondary ms-auto mb-0 d-none">Invoice</a>
              	</div>
            </div>
            <div class="card-body p-3 px-5 pt-0">
              	<hr class="horizontal dark mt-0 mb-4">
              	<div class="row">
		    <div class="col-lg-6 col-md-6 col-12">
		    <div class="d-flex">
                    	    <div>
                    		<img src="{{ cryptoSvgColor($deposit->transaction->coin->code) }}" class="avatar avatar-xxl me-3" alt="product image">
                	    </div>
                	    <div>
				<h6 class="text-lg mb-0 mt-2">{{ $deposit->transaction->coin->display_name }} deposit</h6>
				<p class="text-sm mb-3">{{ $deposit->transaction->status->name == 'Successful' ? 
	'Deposit was confirmed '.readFullTime($deposit->transaction->updated_at) :
	($deposit->transaction->status->name == 'Pending' ? 
		'Awaiting transaction' :
		'Request is declined') }}</p>          		
				<span class="badge badge-sm bg-gradient-{{ $deposit->transaction->status->color }}">{{ $deposit->transaction->status->name }}</span>
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
                        	    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ readFullTime($deposit->transaction->created_at) }}</p>
                      		</div>
                    	    </div>
                    	    <div class="timeline-block mb-3">
                      		<span class="timeline-step">
                        	    <i class="cf cf-{{ $deposit->transaction->coin->code }}"></i>
                      		</span>
                      	        <div class="timeline-content">
                        	    <h6 class="text-dark text-sm font-weight-bold mb-0">Receiver Address</h6>
                        	    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0 text-truncate">{{ $deposit->transaction->address }}</p>
				</div>
			        <div class="timeline-block mb-3">
                      		    <span class="timeline-step">
                        	        <i class="cf cf-{{ $deposit->transaction->coin->code }}"></i>
                      		    </span>
                      		<div class="timeline-content">
                        	    <h6 class="text-dark text-sm font-weight-bold mb-0">Sender Address</h6>
                        	    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0 text-truncate">{{ $deposit->transaction->status->name == 'Successful' ? $deposit->transaction->sender_address : 'N/A' }}</p>
                      	    	</div>

                    	    </div>
                    	    <div class="timeline-block mb-3">
                      	    	<span class="timeline-step">
                        	    <span class="btn-inner--icon"><img id="trust-img" class="w-100 me- mb-0" src="{{ cryptoSvg('trust') }}" alt="trust wallet logo"></i></span>
                      	    	</span>
                      	    	<div class="timeline-content">
                            	    <h6 class="text-dark text-sm font-weight-bold mb-0">Exchange</h6>
                            	    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $deposit->transaction->status->name == 'Successful' ? $deposit->transaction->means : 'N/A'}}</p>
                      	    	</div>
                    	    </div>
                    	    <div class="timeline-block mb-3">
                      	    	<span class="timeline-step">
                        	    <span class="btn-inner--icon"><img id="trust-img" class="w-80 pl-1 mb-0" src="{{ URL::asset('img/blockchain.png') }}" alt="logo"></i></span>
                      	    	</span>
                      	    	<div class="timeline-content">
                        	    <h6 class="text-dark text-sm font-weight-bold mb-0">Blockchain proof</h6>
                        	    <a href="{{ $deposit->transaction->tx !== null ? $deposit->transaction->link() : 'javascript;'}}" class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $deposit->transaction->tx !== null ? 'View transaction' : 'Link unavailable'}}</a>
                      	    	</div>
                    	    </div>
                    	</div>
		    </div>
	        </div>
                <div class="col-lg-5 col-md-6 col-12">
                    <h6 class="mb-3">Payment receiver</h6>
		    <x-general.wallet :coin="$deposit->transaction->coin" :address="$deposit->transaction->receiver_address">
			<i class="fas fa-clipboard ms-auto text-dark cursor-pointer" id="" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard"></i>
		    </x-general.wallet>
			 
                  	<h6 class="mb-3 mt-4">User Information</h6>
                	<ul class="list-group">
                    	    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                      		<div class="d-flex flex-column">
                        	    <h6 class="mb-3 text-sm">{{ $deposit->transaction->client->name }}</h6>
                        	    <span class="mb-2 text-xs">Location: <span class="text-dark font-weight-bold ms-2">{{ $deposit->transaction->client->country->nicename ?? 'N/A' }}</span></span>
                        	    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-2 font-weight-bold"><a href="mailto:{{ $deposit->transaction->client->email }}" class="__cf_email__" data-cfemail="1b7477726d7e695b796e6969726f7435787476">{{ $deposit->transaction->client->email }}</a></span></span>
                        	    <span class="text-xs d-none">VAT Number: <span class="text-dark ms-2 font-weight-bold">FRB1235476</span></span>
                      	    	</div>
		    	    </li>
                  	</ul>
                    </div>
                    <div class="col-lg-3 col-12 ms-auto">
                  	<h6 class="mb-3">Request Summary</h6>
                  	<div class="d-flex justify-content-between">
                    	    <span class="mb-2 text-sm">
                      		Deposit amount:
                    	    </span>
                    	    <span class="text-dark font-weight-bold ms-2">{{ dollar($deposit->transaction->amount) }}</span>
                  	</div>
                  	<div class="d-flex justify-content-between">
                    	    <span class="mb-2 text-sm">
                      		Charges:
                    	    </span>
                    	    <span class="text-dark ms-2 font-weight-bold">{{ dollar($deposit->transaction->charge) }}</span>
                  	</div>
                  	<div class="d-flex justify-content-between mt-4">
                    	    <span class="mb-2 text-lg">
                      		Total:
                    	    </span>
                    	    <span class="text-dark text-lg ms-2 font-weight-bold">{{ dollar($deposit->transaction->amount + $deposit->transaction->charge) }}</span>
                  	</div>
		    </div>
		    @if ($deposit->transaction->proof !== null)
		    <div class="col-lg-8 col-12 mx-auto">
        		<div class="card card-blog card-plain">
          		    <div class="position-relative">
            			<a target="_blank" href="{{ URL::asset('storage/'.$deposit->transaction->proof) }}" class="d-block blur-shadow-image">
              			<img class="img border-radius-md max-width-300 w-100 position-relative z-index-2" src="{{ URL::asset('storage/'.$deposit->transaction->proof) }}" alt="proof" >
				</a>
			    </div>
			</div>
		    </div>
		    @endif
                  	
              	</div>
            </div>
	</div>
    </div>
</div>
