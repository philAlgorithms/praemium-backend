<div class="{{ $class }}">
    <div class="card my-5">
	<div class="card-header p-3 pb-0">
	    <div class="d-flex justify-content-between align-items-center">
		<div>
		    <h6>Withdrawal Details</h6>
		    <p class="text-sm mb-0">
		    Transaction id no. <b>{{ $withdrawal->id }}</b>
		    </p>
		    <p class="text-sm">
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
			    <p class="text-sm mb-3">{{
			    $withdrawal->transaction->status->name == 'Successful' ?
			    'Withdrawal was confirmed '.readFullTime($withdrawal->transaction->updated_at) :
			    ($withdrawal->transaction->status->name == 'Pending' ?
			    'Awaiting transaction' :
			    'Request is declined') }}</p>
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
				<p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $withdrawal->transaction->receiver_address }}</p>
			    </div>
			</div>
			<div class="timeline-block mb-3">
			    <span class="timeline-step">
				<i class="cf cf-{{ $withdrawal->transaction->coin->code }}"></i>
			    </span>
			    <div class="timeline-content">
				<h6 class="text-dark text-sm font-weight-bold mb-0">Sender Address</h6>
				<p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $withdrawal->transaction->status->name == 'Successful' ? $withdrawal->transaction->sender_address : 'N/A' }}</p>
			    </div>
			</div>

    			<div class="timeline-block mb-3">
			    <span class="timeline-step">
				<i class="ni ni-check-bold text-success text-gradient"></i>
			    </span>
			    <div class="timeline-content">
				<h6 class="text-dark text-sm font-weight-bold mb-0">Blockchain invoice</h6>
				<a href="{{ $withdrawal->transaction->tx !== null ? $withdrawal->transaction->link() : 'javascript;'}}" class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $withdrawal->transaction->tx !== null ? 'View transaction' : 'Link unavailable'}}</a>
			    </div>
			</div>
		    </div>
		</div>
		<div class="col-lg-5 col-md-6 col-12">
		    <h6 class="mb-3">Payment details</h6>
		    <x-card.wallet.brief
			:coin="$withdrawal->transaction->coin"
			:address="$withdrawal->transaction->receiver_address">
			<button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto  copy" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Copy to clipboard" data-copy-target=".copy-text">
			    <i class="fas fa-clipboard" aria-hidden="true"></i>
			</button>
		    </x-card.wallet.brief>
		    <h6 class="mb-3 mt-4">Billing Information</h6>
		    <ul class="list-group">
			<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
			    <div class="d-flex flex-column">
				<h6 class="mb-3 text-sm">{{ $withdrawal->transaction->client->fullname() }}</h6>
				<span class="mb-2 text-xs">Location: <span class="text-dark font-weight-bold ms-2">{{ $withdrawal->transaction->client->country->nicename }}</span></span>
				<span class="mb-2 text-xs">Email Address: <span class="text-dark ms-2 font-weight-bold"><a href="mailto:{{ $withdrawal->transaction->client->email }}" class="__cf_email__" data-cfemail="a7c8cbced1c2d5e7c5d2d5d5ced3c889c4c8ca">{{ $withdrawal->transaction->client->email }}</a></span></span>
				<span class="text-xs">Contact: <span class="text-dark ms-2 font-weight-bold">{{ $withdrawal->transaction->client->phone_number ?? 'Unavailable' }}</span></span>
			    </div>
			</li>
		    </ul>
		</div>
		<div class="col-lg-3 col-12 ms-auto">
		    <h6 class="mb-3">Order Summary</h6>
		    <div class="d-flex justify-content-between">
			<span class="mb-2 text-sm">
			    Amount Withdrawaled:
			</span>
			<span class="text-dark font-weight-bold ms-2">{{ dollar($withdrawal->transaction->transaction->amount) }}</span>
		    </div>
		    <div class="d-flex justify-content-between">
			<span class="mb-2 text-sm">
			    Service Charge:
			</span>
			<span class="text-dark ms-2 font-weight-bold">{{ dollar($withdrawal->transaction->transaction->charges) }}</span>
		    </div>

		    <div class="d-flex justify-content-between mt-4">
			<span class="mb-2 text-lg">
			    Net Withdrawal:
			</span>
			<span class="text-dark text-lg ms-2 font-weight-bold">{{ dollar($withdrawal->transaction->transaction->amount + $withdrawal->transaction->transaction->charges) }}</span>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>
