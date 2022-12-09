<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.dashboard-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
	<x-navigations.topbar-pro colorState="dark">
	    <x-general.dashboard-breadcrumb
		pageName="Deposits"
		pageTitle="Fund account"
		color="dark"
	    />
	</x-navigations.topbar-pro>
	<div class="page-header bg-gradient-primary  position-relative m-3 border-radius-xl">
    	    <img src="{{ URL::asset('dashboard/img/shapes/waves-white.svg') }}" alt="pattern-lines" class="position-absolute opacity-6 start-0 top-0 w-100">
    	    <div class="container pb-lg-9 pb-10 pt-7 postion-relative z-index-2">
      		<div class="row">
        	    <div class="col-md-6 mx-auto text-center">
          		<h3 class="text-white">Welcome, {{ $client->name }} to our pricing page</h3>
          		<p class="text-white">Explore our investment packages and choose the one that meets your budget.<br/>You have Free Unlimited Updates and Premium Support on each package.</p>
        	    </div>
      		</div>
      		<div class="row">
        	    <div class="col-lg-4 col-md-6 col-7 mx-auto text-center">
          		<div class="nav-wrapper mt-5 position-relative z-index-2 d-none">
            		    <ul class="nav nav-pills nav-fill flex-row p-1" id="tabs-pricing" role="tablist">
              			<li class="nav-item">
                		    <a class="nav-link mb-0 active" id="tabs-iconpricing-tab-1" data-bs-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="true">
					Monthly
                		    </a>
              			</li>
              		    	<li class="nav-item">
				    <a class="nav-link mb-0" id="tabs-iconpricing-tab-2" data-bs-toggle="tab" href="#annual" role="tab" aria-controls="annual" aria-selected="false">
                  			Annual
                		    </a>
              			</li>
            		    </ul>
          		</div>
        	    </div>
      		</div>
    	    </div>
	</div>

	<div class="mt-n8">
    	    <div class="container">
      		<div class="tab-content tab-space">
        	    <div class="tab-pane active" id="monthly">
			<div class="row">
			@foreach ($plans as $plan)
			    <x-cards.pricing-waves
				class="col-md-6 col-lg-4 mb-4"
				:plan=$plan 
			    >
				{{ ucfirst($plan->period->adverb)}} for 1 {{ $plan->duration->singular }}
			    </x-cards.pricing-waves>	
			@endforeach
			<x-modals.dashboard-subscribe />
			</div>
		    </div>
		</div>
	    </div>
	</div>
	<div class="container-fluid py-4">
	    <div class="row">
		<div class="col-12 col-md-6">
		    <div class="row">
		<x-cards.general-stat />
	    
		    </div>
		</div>
		<x-cards.coin-stat
		    class="col-12 col-md-6">

		</x-cards.coins-stat>
	    
	    </div>
	    <div class="row mt-4">

	    </div>
	    <x-navigations.dashboard-footer />
	</div>
    </main>
    <?php /*<x-general.settings/>*/ ?>
</x-layouts.dashboard >
