<x-modals.layout :id="$plan->name.'plan'" class="col-md-12 subscribe-modal">
    <div class="card card-plain text-start">
        <div class="card-header pb-0 text-left">
            <h3 class="font-weight-bolder text-info text-gradient">Subscribe to package</h3>
	    <p class="mb-0">You are about to subscribe to {{ $plan->name }} package. <b>{{ dollar($plan->cost) }}</b> will be deducted from your funded account.</p>
	    <p>A service charge of {{ dollar(percentage($plan->cost, variable('PLAN_CHARGE') )) }} applies</p>
	</div>
	<div class="card-body">
	    <form role="form text-left">
	    @csrf
		<input type="hidden" class="pid" value="{{ $plan->id }}" >
		<div class="form-group">
		    <label for="amount">Amount</label>
		    <div class="input-group mb-4">
			<input type="number" class="form-control amount" placeholder="Enter amount">
		    </div>
		    <label for="addresss">Enter password to proceed</label>
		    <div class="input-group mb-4">
          		<input type="password" class="form-control password" placeholder="Enter password">
        	    </div>
      		</div>
		<div class="text-center">
		    <div class="button-row d-flex mt-4">
			<button class="btn bg-gradient-light mb-0 cancel-btn" type="button" title="Cancel">Cancel</button>
			<button class="btn bg-gradient-dark ms-auto mb-0 subscribe-btn" type="button" title="Next">Proceed</button>
			<button class="btn bg-gradient-dark ms-auto mb-0 d-none loading-subscribe-btn" type="button" disabled>
		            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		            <span id="load-text">Proceed</span>
		        </button>
		    </div>
		</div>
	    </form>
    	</div>
    </div>
</x-modals.layout>

