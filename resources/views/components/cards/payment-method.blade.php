<div class="mb-lg-0 mb- {{ $class }}" id="addresses">
    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Payment Method</h6>
                </div>
                <div class="col-6 text-end">
		    <button class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#new-wallet"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Wallet</button>

		    <x-modals.layout id="new-wallet">
			<div class="card card-plain text-start">
              		    <div class="card-header pb-0 text-left">
                		<h3 class="font-weight-bolder text-info text-gradient">New Wallet</h3>
                		<p class="mb-0">Select the Cryptocurrency and then add the wallet address.</p>
			    </div>
			    <div class="card-body">
				<form role="form text-left">
				@csrf
				   <div class="form-group">
					<label for="coin-switch">Select cryptocurrency/token</label>
					<div class="input-group mb-4">
					    <span class="input-group-text"><i id="coin-logo" class="cf cf-btc"></i></span>
	    				    <select class="form-control" id="switch-coin">
	    				    @foreach ($coins as $i=>$coin)
	    					@php $selected = $i==0 ? 'selected' : '' @endphp
						<option value="{{ $coin->id.'|'.$coin->code }}" {{ $selected }} >{{ $coin->display_name }}</option>
	    				    @endforeach
	    				    </select>
	    				    <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
				    	</div>
				    </div>

				    <div class="form-group">
					<label for="address">Enter Wallet Address</label>
					<div class="input-group mb-4">
          		    		    <input type="text" class="form-control" placeholder="Wallet address" id="wallet-address" value="">
        				</div>
      		    		    </div>
				    <div class="text-center">
					<button type="button" class="btn bg-gradient-dark mb-0" id="add-wallet"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Wallet</button>
					<button type="button" class="btn bg-gradient-dark mb-0 d-none" id="btn-loading" type="button" disabled>
					    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					    <span id="load-text">Add Wallet</span>
					</button>
				    </div>
				</form>
			    </div>
			</div>
		    </x-modals.layout>

                </div>
            </div>
        </div>
        <div class="card-body p-3">
	    <div class="row">
	    @foreach ($wallets as $wallet)
	        <div class="col-md-6 mb-4 wallet-wrapper">
		    <x-general.wallet :coin="$wallet->coin" :address="$wallet->address">
			<i class="fas fa-trash ms-auto text-danger cursor-pointer delete-wallet" id="delete_wallet-{{ $wallet->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Address"></i>
		    </x-general.wallet>
		</div>
	    @endforeach
            </div>
        </div>
    </div>
</div>
