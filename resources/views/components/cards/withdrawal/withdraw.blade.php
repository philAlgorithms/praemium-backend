<div class="col-12 col-md-6 my-4 mb-md-4">
    <div class="card bg-gradient-dark">
	<div class="card-body">
	    <div class="mb-2">
		<span class="h2 text-white">Withdraw Earnings</span>
		<div class="text-white opacity-8 mt-2 text-sm"></div>
	    </div>
	    <form class="text-white">
		<input type="hidden" id="deposit-param" data-coin="{{ '' }}" data-amount="{{ '' }}" data-address="{{ '' }}">
		<div class="mb-3">
		    <label class="text-white">Amount</label>
                    <x-forms.input id="withdrawal-amount" type="number" class="form-control-lg" placeholder="Amount">
                        <x-slot:prepend><i class="fas fa-dollar-sign"></i></x-slot>
		    </x-forms.input>
		</div>
                <div class="form-group">
                    <label class="text-white" for="coins">Select Crypto Currency</label>
		    <select class="form-control" id="withdrawal-coin">
		    @if(client()->wallets->count() < 1)
			<option>You have not registered any wallet addresses</option> 
		    @endif
                    @foreach (client()->wallets as $i=>$wallet)
                        <option value="{{ $wallet->coin->id }}" {{ $i===0 ? 'selected' : '' }}>{{ $wallet->coin->display_name }}</option>
                    @endforeach
                    </select>
		</div>
		@if (auth()->user()->wallets->count() < 1)
		    <button type="button" class="btn btn-danger btn-gradient mx-auto" data-bs-toggle="modal" data-bs-target="#add-wallet-modal">Add Wallet</button>
		@endif
		<x-forms.button.spinning
		    id="withdraw"
		    class="btn btn-sm btn-primary mb-0 w-100"
		    text="Withdraw"
		/>
	    </form>
	</div>
	<div class="card-footer pt-0">
	    <div class="row">
    	    </div>
	</div>
    </div>
</div>
