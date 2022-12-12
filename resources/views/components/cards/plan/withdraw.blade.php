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
		    {{ checkFloat($plan->roi) }}%
		</h1>
		<h6 class="text-white">{{ $slot }}</h6>
		<input type="hidden" class="plan-cost" value="{{ $plan->min }}">
            </div>
      	</div>
        <div class="position-relative mt-n5" style="height: 50px;">
            <div class="position-absolute w-100">
           	<x-svg.waves /> 
            </div>
      	</div>
	<div class="card-body text-center">
	    {{-- <h6 class="text- mb-2">For every {{ dollar($plan->cost) }} subscription, you get:</h6> --}}
            <ul class="list-unstyled max-width-200 mx-auto">
		<li>
		    <b><small>$</small>{{ noSigil($plan->min) }}</b> Minimum Deposit 
            	    <hr class="horizontal dark">
          	</li>
          	<li>
            	    <b><small>$</small>{{ $plan->max < env('MAX_AMOUNT') ? noSigil($plan->max) : 'Unlimited' }}</b> Maximum Deposit
            	    <hr class="horizontal dark">
          	</li>
            <li>
                <b><small>$</small>{{ noSigil($plan->activeEarning($client)) }}</b> Minimum Deposit 
                        <hr class="horizontal dark">
                  </li>
          	<li>
            	10% Referral Bonus
          	</li>
            </ul>
            <button class="btn bg-gradient-dark w-100 mt-4 mb-0 check-btn  plan-button" data-bs-toggle="modal" data-bs-target="#subscribe-modal" data-id="{{ $plan->id }}" data-name="{{ $plan->name }}">
				Withdraw Now
			</button>
	        <x-modals.plan-subscription :plan=$plan />
	
			<button class="btn bg-gradient-primary w-100 mt-4 mb-0 loading-btn d-none" type="button" disabled>
				<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
				<span id="load-text"> Withdraw now</span>
			</button>
      	</div>
    </div>
</div>
