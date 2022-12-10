<div class="card card-plain text-start">
    <div class="card-header pb-0 text-left">
        <h3 class="font-weight-bolder text-info text-gradient">Upload Deposits</h3>
	    <p>Fill the transaction details below</p>
    </div>
    <div class="card-body">
    	<form role="form text-left">
	@csrf
	    <input type="hidden" class="pid" value="" >
	    <div class="form-group">
	    	<label>Amount deposited</label>
		<div class="input-group">
		    <span class="input-group-text" id="addon2">$</span>
		    <input type="number" class="form-control" id="upload-amount" placeholder="Amount deposited" aria-label="Plan cost" aria-describedby="addon2">
		</div>
	    </div>

	    <div class="form-group">
		<label for="coin-switch">Select transaction cryptocurrency</label>
		<div class="input-group mb-4">
		    <span class="input-group-text cl"><i class="cf cf-btc"></i></span>
	    	    <select class="form-control" id="coins">
	    	    @foreach (acceptedCoins() as $i=>$coin)
	    		@php $selected = firstCoin(acceptedCoins(), 'btc')->id == $coin->id ? 'selected' : '' @endphp
	         	<option value="{{ $coin->id }}" {{ $selected }}>{{ $coin->display_name }}</option>
	    	    @endforeach
	    	    </select>
	    	    <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
		</div>
	    </div>

	    <div class="form-group">
		<label>Receiver address</label>
		<div class="input-group mb-4">
		    <span class="input-group-text cl"><i class="cf cf-btc"></i></span>
	    	    <select class="form-control" id="wallets">
	    	    @foreach (acceptedCoins()->first()->adminWallets as $i=>$wallet)
	    		@php $selected = firstWallet(acceptedCoins()->first()->adminWallets, 'btc')->id == $wallet->id ? 'selected' : '' @endphp
	         	<option value="{{ $wallet->id }}" {{ $selected }}>{{ $wallet->address }}</option>
	    	    @endforeach
	    	    </select>
	    	    <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
		</div>
	    </div>	
	    <div class="form-group">
		<label>Sender address</label>
		<div class="input-group">
		    <span class="input-group-text cl" id="addon3"><i class="cf cf-btc"></i></span>
		    <input type="text" class="form-control" id="upload-sender" placeholder="Sender address" aria-label="Inrerest roi" aria-describedby="addon3">
		</div>
	    </div>
	    
	    <div class="form-group">
		<label>Image proof (max: 2MB)</label>
		<div class="input-group">
		    <span class="input-group-text" id="addon9"><i class="fas fa-photo"></i></span>
		    <input type="file" class="form-control" id="proof" placeholder="Select one image" aria-label="exchange" aria-describedby="addon9">
		</div>
	    </div>


		<div class="form-group">
		    <label>Blockchain hash</label>
		    <div class="input-group">
			<span class="input-group-text cl" id="addon3"><i class="cf cf-btc"></i></span>
			<input type="text" class="form-control" id="upload-hash" placeholder="Blockchain hash (optional)" aria-label="hash" aria-describedby="addon3" >
		    </div>
		</div>
		<div class="form-group">
		    <label>Exchange</label>
		    <div class="input-group">
			<span class="input-group-text cl" id="addon9"><i class="cf cf-btc"></i></span>
			<input type="text" class="form-control" id="upload-exchange" placeholder="Exchange platform (optional)" aria-label="exchange" aria-describedby="addon9">
		    </div>
		</div>
		@foreach (\App\Models\AdminWallet::all() as $i=>$wallet)
		    <input type="hidden" class="wallet-{{ $wallet->coin->id }}" id="{{ $wallet->id }}" value="{{ $wallet->address }}">
		@endforeach

		@foreach (acceptedCoins() as $i=>$coin)
		    <input type="hidden" id="logo-{{ $coin->id }}" value="{{ $coin->code }}">
		@endforeach
		<div class="form-group d-none">
		    <label for="address">Enter password to proceed</label>
		    <div class="input-group mb-4">
          		<input type="password" class="form-control" id="upload-password" placeholder="Enter password">
        	    </div>
      		</div>
		<div class="text-center">
		    <div class="button-row d-flex mt-4">
			<button class="btn bg-gradient-light mb-0" id="upload-cancel" type="button" title="Cancel">Cancel</button>
			<button class="btn bg-gradient-dark ms-auto mb-0" id="upload" type="button" title="Next">Proceed</button>
			<button class="btn bg-gradient-dark ms-auto mb-0 d-none" id="upload-loading" type="button" disabled>
		            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		            <span id="load-text">Processing</span>
		        </button>
		    </div>
		</div>
	    </form>
    	</div>
    </div>

