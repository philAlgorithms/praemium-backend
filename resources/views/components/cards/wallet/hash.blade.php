<div class="col-12 col-md-6 my-4 mb-md-0">
    <div class="card bg-gradient-dark">
	<div class="card-body">
	    <div class="mb-2">
		<span class="h2 text-white">Confirm Transaction</span>
		<div class="text-white opacity-8 mt-2 text-sm">Enter transaction id/hash to complete payment</div>
	    </div>
	    <form>
		<input type="hidden" id="deposit-param" data-plan="{{ $plan->id }}" data-coin="{{ $coin->id }}" data-amount="{{ $amount }}" data-address="{{ $address }}">
		<div class="mb-3">
		    <x-forms.input id="hash" class="mb-4 form-control-lg" placeholder="Enter transaction id">
		    </x-forms.input>
		</div>
		<x-forms.button.spinning
		    id="deposit"
		    class="btn btn-sm btn-white mb-0 w-100"
		    text="Proceed"
		/>
	    </form>
	</div>
	<div class="card-footer pt-0">
	    <div class="row">
    	    </div>
	</div>
    </div>
</div>
