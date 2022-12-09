<nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4"> 
    <div class="container-fluid px-0"> 
	<a class="navbar-brand font-weight-bolder ms-sm-3" href="/" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
	    {{ appName() }}
	</a> 
	<a href="{{ is_auth() ? '/account' : '/register'}}" class="btn btn-sm bg-gradient-primary btn-round mb-0 ms-auto d-lg-none d-md-block">
	    {{ is_auth() ? 'Dashboard' : 'Register' }}
	</a>
	<button class="navbar-toggler shadow-none ms-md-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"> 
	    <span class="navbar-toggler-icon mt-2"> 
		<span class="navbar-toggler-bar bar1"></span> 
		<span class="navbar-toggler-bar bar2"></span> 
		<span class="navbar-toggler-bar bar3"></span> 
	    </span> 
	</button> 
	<div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation"> 
	    <ul class="navbar-nav navbar-nav-hover mx-auto">
		<li class="nav-item dropdown dropdown-hover mx-2">
		    <a href="/" class="nav-link ps-2 d-flex justify-content-between align-items-center">
		  	Home
		    </a>
		</li>
		<li class="nav-item dropdown dropdown-hover mx-2">
		    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="plans" data-bs-toggle="dropdown" aria-expanded="false">
                    	Investment Plans
                    	<img src="{{ URL::asset('img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow ms-1">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="plans">
			<div class="d-none d-lg-block">
			@foreach (\App\Models\Plan::all() as $plan)
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                            		<x-svg.office /> 
                          	    </div>
                        	</div>
				<a href="/#package-{{ $plan->name }}" class="dropdown-item border-radius-md">
			   	    <span class="">{{ $plan->name }} Package</span>
				</a>
                      	    </h6>
                	@endforeach
                    	</div>
			<div class="d-lg-none">
			@foreach (\App\Models\Plan::all() as $plan)
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                            		<x-svg.office /> 
                          	    </div>
                        	</div>
				<a href="/#package-{{ $plan->name }}" class="dropdown-item border-radius-md">
			   	    <span class="">{{ $plan->name }} Package</span>
				</a>
                      	    </h6>
                	@endforeach
			</div>
                    </div> 
		</li>    
		<li class="nav-item dropdown dropdown-hover mx-2">
		    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                    	Account
                    	<img src="{{ URL::asset('img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow ms-1">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
                    	<div class="d-none d-lg-block">
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                            		<x-svg.customer-support /> 
                          	    </div>
                        	</div>
				<a href="/sign-in" class="dropdown-item border-radius-md">
			   	    <span class="">Sign in</span>
				</a>
                      	    </h6>
                
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center ps-0">
                            		<x-svg.spaceship /> 
                          	    </div>
                        	</div>
				<a href="/sign-up" class="dropdown-item border-radius-md">
			    	    <span class="">Register</span>
				</a>
                      	    </h6>
                    	</div>
                    	<div class="d-lg-none">
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                           		<x-svg.customer-support /> 
                          	    </div>
                        	</div>
				<a href="/sign-in" class="dropdown-item border-radius-md">
			    	    <span class="">Sign in</span>
				</a>
		      	    </h6>
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center ps-0">
                           		<x-svg.spaceship /> 
                          	    </div>
                        	</div>
				<a href="/sign-up" class="dropdown-item border-radius-md">
			    	    <span class="">Register</span>
				</a>
		      	    </h6>  
                    	</div>
                    </div> 
		</li>
		<li class="nav-item dropdown dropdown-hover mx-2">
		    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                    	Company
                    	<img src="{{ URL::asset('img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow ms-1">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
                    	<div class="d-none d-lg-block">
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                            		<x-svg.customer-support /> 
                          	    </div>
                        	</div>
				<a href="/about-us" class="dropdown-item border-radius-md">
			   	    <span class="">About us</span>
				</a>
                      	    </h6>
                
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center ps-0">
                            		<x-svg.spaceship /> 
                          	    </div>
                        	</div>
				<a href="/about-us#faq" class="dropdown-item border-radius-md">
			    	    <span class="">FAQ</span>
				</a>
                      	    </h6>
                    	</div>
                    	<div class="d-lg-none">
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                           		<x-svg.customer-support /> 
                          	    </div>
                        	</div>
				<a href="/sign-in" class="dropdown-item border-radius-md">
			    	    <span class="">About us</span>
				</a>
		      	    </h6>
                      	    <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center px-0 mt-0">
                        	<div class="d-inline-block">
                          	    <div class="icon icon-shape icon-xs border-radius-md bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center ps-0">
                           		<x-svg.spaceship /> 
                          	    </div>
                        	</div>
				<a href="/sign-up" class="dropdown-item border-radius-md">
			    	    <span class="">FAQ</span>
				</a>
		      	    </h6>  
                    	</div>
                    </div> 
		</li>  
	    </ul> 
	    <ul class="navbar-nav d-lg-block d-none"> 
		<li class="nav-item"> 
		    <a href="/sign-up" class="btn btn-sm bg-gradient-primary btn-round mb-0 me-1" onclick="smoothToPricing('pricing-soft-ui')">
			Register
		    </a> 
		</li> 
	    </ul> 
	</div> 
    </div> 
</nav> <!-- End Navbar -->
