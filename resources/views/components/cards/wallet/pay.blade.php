<div class="{{ $class }}">
    <div class="card bg-gradient-danger h-100">
	<div class="card-body">
	    <div class="row justify-content-between align-items-center">
		<div class="col">
		    <img src="{{ cryptoSvgColor($wallet->coin->code) }}" class="w-30 border-radius-md" alt="Image placeholder">
		</div>
		<div class="col-auto">
		    <a target="_blank" href="{{ $walletPay }}" class="badge badge-lg badge-info">Use Wallet</a>
		</div>
	    </div>
	    <div class="my-4">
		<p class="text-white opacity-8 mb-0 text-sm">{{ $message }}</p>
		<div class="h6 text-white cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Copy Addres">{{ $wallet->address }}</div>
	    </div>
	    <div class="row mt-5">
		<div class="col">
		    <p class="text-white opacity-8 mb-0 text-sm">Coin/Token</p>
		    <span class="d-block h6 text-white">{{ $wallet->coin->display_name }}</span>
		</div>
		<div class="col ms-auto text-end">
		    <div class="col">
			<p class="text-white opacity-8 mb-0 text-sm">Dollar Equivalent</p>
			<span class="d-block h6 text-white">{{ $amount }}</span>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>
