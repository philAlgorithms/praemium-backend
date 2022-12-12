<div class="{{ $class }}">
    <div class="card card-pricing">
	<div class="card-header bg-gradient-{{ $plan->color }} text-center pt-4 pb-5 position-relative">
	    <x-general.tooltip-dropdown class="col-12 text-end">
		<x-general.tooltip-element-svg 
		    text="Deposit with this plan" 
		    link="/deposit-funds">
			<x-svg.credit-card color="dark" />
		</x-general.tooltip-element-svg>
		<x-general.tooltip-element-svg
		    text="Withdraw from this plan" 
		    link="/account/withdrawal/withdraw">
			<x-svg.basket color='dark' />
		</x-general.tooltip-element-svg>
	    </x-general.tooltip-dropdown>
            <div class="z-index-1 position-relative">
          	<h5 class="text-white">{{ $plan->name }}</h5>
          	<h1 class="text-white mt-2 mb-0">
		    <small>$</small>{{ noSigil($plan->cost) }} - <small>$</small>{{ noSigil($plan->max_cost) }}
		</h1>
		<h6 class="text-white">{{ $slot }}</h6>
		<input type="hidden" class="plan-cost" value="{{ $plan->cost }}">
            </div>
      	</div>
        <div class="position-relative mt-n5" style="height: 50px;">
            <div class="position-absolute w-100">
           	<x-svg.waves /> 
            </div>
      	</div>
      	<div class="card-body text-center">
            <ul class="list-unstyled max-width-200 mx-auto">
		<li>
		    <b><small>$</small>{{ noSigil($plan->interest('1 day')) }}</b> ROI Daily 
            	    <hr class="horizontal dark">
          	</li>
          	<li>
            	    <b><small>$</small>{{ noSigil($plan->interest('1 week')) }}</b> ROI</b> Weekly
            	    <hr class="horizontal dark">
          	</li>
          	<li>
            	    <b><small>$</small>{{ noSigil($plan->interest('1 month')) }}</b> ROI Monthly
            	    <hr class="horizontal dark">
          	</li>
          	<li>
            	    <b><small>$</small>{{ noSigil($plan->interest('3 months')) }}</b> ROI Quartely
          	</li>
	    </ul>
	    <div class="text-center">
		<div class="button-row d-flex mt-4 justify-content-between">
		    
            <button class="btn bg-gradient-danger w-100 mt-4 mb-0 delete">
          	Delete Package
	    </button>
	
	    <button class="btn bg-gradient-danger w-100 mt-4 mb-0 ml-5 loading-delete-btn d-none" type="button" disabled>
		<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span> Delete Package</span>
	    </button>&nbsp;
            <button class="btn bg-gradient-dark w-100 mt-4 mb-0 edit">
          	Edit Package
	    </button>
	    <x-modals.plan-edit :plan=$plan />
	
	    <button class="btn bg-gradient-primary w-100 mt-4 mb-0 loading-edit d-none" type="button" disabled>
		<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span > Edit Package</span>
	    </button>
		
		</div>
	    </div>
      	</div>
    </div>
</div>
