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
	       <x-forms.switch-coin :coins=$wallets />
	        @foreach ($wallets as $wallet)
	       	    <input type="hidden" id="{{ $wallet['id'] }}-name" value="{{ strtolower($wallet['nome']) }}" >
		@endforeach
		<div class="col-md-12 mb-3 mx-auto">
		    <div class="form-group">
			<label for="deposit-amount">Enter amount in USD</label>
			<div class="input-group mb-4">
			    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
          		    <input type="number" class="form-control" placeholder="Enter amount" id="deposit-amount" value="0">
        		</div>
      		    </div>
		</div>

<span>Transfer <span id="notice-price">0.00 </span><span class="text-bold" id="notice-coin">btc</span> to:</span>
		<div class="col-md-12 mb-4 mx-auto">
                    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img id="notice-svg" class="w-10 me-3 mb-0" src="{{ cryptoSvg('btc') }}" alt="logo">
                        <h6 class="mb-0 text-truncate" id="notice-address">bc1qkz36qxz4smwk57m3ryuwm84mpw0hdls32ya4ee</h6>
                        <i class="fas fa-clipboard ms-auto text-dark cursor-pointer" id="notice-clipboard" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy to clipboard"></i>
                    </div>
		</div>
  
		<div class="col-12 mx-auto">
		    <form>
		    @csrf
                    <button type="button" id="pay" class="col-8 col-md-6 btn btn-twitter btn-icon">
    			<span class="btn-inner--icon"><img class="w-20 me- mb-0" src="{{ cryptoSvg('trust') }}" alt="logo"></i></span>
    			<span class="btn-inner--text"> Use Trust Wallet</span>
		    </button>
		    </form>  
		</div>
	    </div>
        </div>
    </div>
</div>
