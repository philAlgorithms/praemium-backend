<div class="mb-lg-0 mb-4 {{ $class }}" id="addresses">
    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <h6 class="mb-0">Withdraw Funds</h6>
                </div>
                <div class="col-6 text-end d-none">
                    <button class="btn bg-gradient-dark mb-0" id="switch-coin-alt"><i class="fas fa-exchange-alt"></i>&nbsp;&nbsp;SWITCH COIN</button>
                </div>
            </div>
        </div>
	<div class="card-body p-3">
            <div class="row">

	        <x-forms.switch-client-coin
		    :coins="acceptedCoins($wallets)"
		    :prices="getPricesByCoins(acceptedCoins($wallets))"
		/>
		@foreach ($wallets as $wallet)
	       	    <input type="hidden" id="{{ $wallet->id }}-name" value="{{ strtolower($wallet->coin->name) }}" >
		@endforeach
		<input type="hidden" id="initial-coin" value="{{ firstWallet($wallets, 'btc')->coin->name.'-'.firstWallet($wallets, 'btc')->coin->code }}" >
		<div class="col-md-12 mb-3 mx-auto">
		    <div class="form-group">
			<label for="withdraw-amount">Enter amount in USD</label>
			<div class="input-group mb-4">
			    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
			    <input type="number" class="form-control" placeholder="Enter amount" id="withdraw-amount" value="0">
			</div>
			<div><span id="charge" class="{{ variable('WITHDRAWAL_CHARGE') }}">{{ dollar(0) }}</span> service charge applies</div>
      		    </div>
		</div>
	    @if (auth()->user()->otp_enabled)
		<div class="col-md-12 mb-3 mx-auto">
		    <div class="form-group">
			<label for="otp">Enter Authenticator OTP</label>
			<div class="input-group mb-4">
			    <span class="input-group-text"><i class="fas fa-key"></i></span>
			    <input type="number" class="form-control" placeholder="Enter OTP from google authenticator" id="otp" >
			</div>
      		    </div>
		</div>
	    @else
		<input type="hidden" id="otp" value="0">
	    @endif



		<span><span id="notice-price" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $inital_amount ?? '$0.00' }} </span><span class="text-bold" id="notice-coin">&nbsp;{{ firstWallet($wallets, 'btc')->coin->code }}</span> will be transferred to:</span>

  		<div class="col-md-12 mb-4 mx-auto">
                    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
			<img id="notice-svg" class="w-10 me-3 mb-0" src="{{ cryptoSvg(firstWallet($wallets, 'btc')->coin->code) }}" alt="logo">
                        <h6 class="mb-0 text-truncate" id="notice-address">{{ firstWallet($wallets, 'btc')->wallet_address }}</h6>
                        <i class="fas fa-clipboard ms-auto text-dark cursor-pointer" id="notice-clipboard" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard"></i>
                    </div>
		</div>
  

		<div class="col-12 d-none">
                    <button type="button" class="btn bg-gradient-dark mb-0" id="switch-coin-alt"><i class="fas fa-credit-card"></i>&nbsp;&nbsp;WITHDRAW</button>
                </div>
            
	    </div>
	    <form>
		@csrf
		<button type="button" class="btn bg-gradient-dark mb-0" id="withdraw"><i class="fas fa-credit-card"></i>&nbsp;&nbsp;WITHDRAW</button>
		<button class="btn bg-gradient-dark mb-0 d-none" id="loading-withdraw" type="button" disabled>
		    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		    <span>&nbsp;&nbsp;WITHDRAW</span>
		</button>
	    </form>
		
        </div>
    </div>
</div>


<?/*
<div class="mb-lg-0 mb-4 {{ $class }}" id="addresses">
    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <h6 class="mb-0">Deposit Funds</h6>
                </div>
                <div class="col-6 text-end d-none">
                    <button class="btn bg-gradient-dark mb-0" id="switch-coin-alt"><i class="fas fa-exchange-alt"></i>&nbsp;&nbsp;SWITCH COIN</button>
                </div>
            </div>
        </div>
	<div class="card-body p-3">
            <div class="row">
	       <x-forms.switch-coin 
		    :coins="acceptedCoins()" 
		    :prices="getPrices()"/>
	        @foreach ($wallets as $wallet)
	       	    <input type="hidden" id="{{ $wallet->id }}-name" value="{{ strtolower($wallet->coin->name) }}" >
		@endforeach
		<input type="hidden" id="initial-coin" value="{{ firstWallet($wallets, 'btc')->coin->name.'-'.firstWallet($wallets, 'btc')->coin->code }}" >
		<div class="col-md-12 mb-3 mx-auto">
		    <div class="form-group mb-4">
			<label for="deposit-amount">Enter amount in USD</label>
			<div class="input-group mb-1">
			    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
			    <input type="number" class="form-control" placeholder="Enter amount" id="deposit-amount" value="0">
			</div>
			<div><span id="charge" class="{{ variable('DEPOSIT_CHARGE') }}">{{ dollar(0) }}</span> service charge applies</div>
      		    </div>
		</div>

<span>Transfer <span id="notice-price" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $inital_amount ?? '$0.00' }} </span><span class="text-bold" id="notice-coin">{{ firstWallet($wallets, 'btc')->coin->code }}</span> to:</span>
		<div class="col-md-12 mb-4 mx-auto">
                    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
			<img id="notice-svg" class="w-10 me-3 mb-0" src="{{ cryptoSvg(firstWallet($wallets, 'btc')->coin->code) }}" alt="logo">
                        <h6 class="mb-0 text-truncate" id="notice-address">{{ firstWallet($wallets, 'btc')->wallet_address }}</h6>
                        <i class="fas fa-clipboard ms-auto text-dark cursor-pointer" id="notice-clipboard" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard"></i>
                    </div>
		</div>
  
		<div class="col-12 mx-auto">
		    <form>
		    @csrf
                        <button type="button" id="pay" class="col-8 col-md-6 btn btn-twitter btn-icon">
    			    <span class="btn-inner--icon"><img id="trust-img" class="w-20 me- mb-0" src="{{ cryptoSvg('trust') }}" alt="logo"></i></span>
    			    <span class="btn-inner--text"> Use Trust Wallet</span>
		    	</button>
			<button class="col-8 col-md-6 btn btn-twitter btn-icon d-none" id="loading-trust" type="button" disabled>
			    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			    <span > Use Trust Wallet</span>
	    		</button>
		
		    </form>  
		</div>
	    </div>
        </div>
    </div>
</div>
