<div class="{{ $class }}" id="package-{{ $plan->name }}">
    <div class="card card-pricing">
	<div class="card-header bg-gradient-{{ $plan->color }} text-center pt-4 pb-5 position-relative">
	    <x-general.tooltip-dropdown class="col-12 text-end d-none">
		<x-general.tooltip-element-svg 
		    text="Deposit with this plan" 
		    link="/deposit-funds">
			<x-svg.credit-card color="dark" />
		</x-general.tooltip-element-svg>
		<x-general.tooltip-element-svg
		    text="Withdraw from this plan" 
		    link="/withdraw-funds">
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
	    <h6 class="text- mb-2">For every {{ dollar($plan->cost) }} subscription, you get:</h6>
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
            <a href="/plans" class="btn bg-gradient-dark w-100 mt-4 mb-0 check-btn">
          	Buy Now
	    </a>
	        <x-modals.plan-subscription :plan=$plan />
	
	    <button class="btn bg-gradient-primary w-100 mt-4 mb-0 loading-btn d-none" type="button" disabled>
		<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span id="load-text"> Buy now</span>
	    </button>
      	</div>
    </div>
</div>
<?php
/*
<div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card shadow-none border bg-gradient-dark h-100 overflow-hidden">
          <img src="{{ URL::asset('img/shapes/pattern-lines.svg') }}" alt="pattern-lines" class="position-absolute">
          <div class="card-header bg-transparent text-sm-start text-center pt-4 pb-3 px-4">
            <h5 class="mb-1 text-white">{{ $plan->name }}</h5>
            <p class="mb-3 text-sm text-white">Free access for 200 members</p>
            <h3 class="font-weight-bolder mt-3 text-white">
               <small class="text-sm text-secondary font-weight-bold">/ year</small>
            </h3>
            <a href="javascript:;" class="btn btn-sm btn-white w-100 border-radius-md mt-4 mb-2">Buy now</a>
          </div>
          <hr class="horizontal light my-0">
          <div class="card-body">
            <div class="d-flex pb-3">
              <div>
                <i class="fas fa-check text-success text-sm"></i>
              </div>
              <div class="ps-3">
                <span class="text-sm text-white">Complete documentation</span>
              </div>
            </div>

            <div class="d-flex pb-3">
              <div>
                <i class="fas fa-check text-success text-sm"></i>
              </div>
              <div class="ps-3">
                <span class="text-sm text-white">Working materials in Sketch</span>
              </div>
            </div>

            <div class="d-flex pb-3">
              <div>
                <i class="fas fa-check text-success text-sm"></i>
              </div>
              <div class="ps-3">
                <span class="text-sm text-white">20GB cloud storage</span>
              </div>
            </div>

            <div class="d-flex pb-3">
              <div>
                <i class="fas fa-check text-success text-sm"></i>
              </div>
              <div class="ps-3">
                <span class="text-sm text-white">100 team members</span>
              </div>
            </div>

          </div>
        </div>
      </div>
