<footer class="footer py-5 bg-gradient-{{ $color }} position-relative overflow-hidden">
    <img src="{{ URL::asset('img/shapes/waves-white.svg') }}" alt="pattern-lines" class="position-absolute start-0 top-0 w-100 opacity-6">
    <div class="container position-relative">
      	<div class="row">
            <div class="col-lg-4 me-auto my-auto text-lg-start text-center">
          	<h6 class="text-{{ $color === 'white' ? 'dark' : 'white' }} font-weight-bolder text-uppercase mb-2">{{ appName() }} Investment</h6>
          	<p class="text-{{ $color === 'white' ? 'dark' : 'white' }}">
		    Copyright © 
		    <script>
              	        document.write(new Date().getFullYear())
            	    </script> {{ appName() }}
          	</p>
            </div>
            <div class="col-lg-2 col-sm-4 col-12 ms-md-auto text-lg-start text-center mb-sm-0 mb-4">
          	<div>
            	    <h6 class="text-{{ $color === 'white' ? 'dark' : 'white' }} text-sm mb-1">Company</h6>
            	    <ul class="flex-column ms-lg-n3 nav">
              		<li class="nav-item">
                	    <a class="nav-link text-{{ $color === 'white' ? 'dark' : 'white' }} opacity-8 text-sm pb-0" href="/about-us">
                  		About Us
                	    </a>
              		</li>
              		<li class="nav-item">
                	    <a class="nav-link text-{{ $color === 'white' ? 'dark' : 'white' }} opacity-8 text-sm pb-0" href="/about-us#faq">
                  		FAQ
                	    </a>
              		</li>
              		<li class="nav-item">
                <a class="nav-link text-{{ $color === 'white' ? 'dark' : 'white' }} opacity-8 text-sm pb-0" href="/terms" >
                  		Terms and Conditions
                	    </a>
              		</li>
            	    </ul>
          	</div>
            </div>
            <div class="col-lg-2 col-sm-4 col-12 text-lg-start text-center mb-sm-0 mb-4">
          	<div>
            	    <h6 class="text-{{ $color === 'white' ? 'dark' : 'white' }} text-sm mb-1">Pages</h6>
		    <ul class="flex-column ms-lg-n3 nav">
			<li class="nav-item">
                	    <a class="nav-link text-{{ $color === 'white' ? 'dark' : 'white' }} opacity-8 text-sm pb-0" href="/blogs" >
                  	     	Home
                	    </a>
              		</li>

              		<li class="nav-item">
                	    <a class="nav-link text-{{ $color === 'white' ? 'dark' : 'white' }} opacity-8 text-sm pb-0" href="/login">
                  		Login
                	    </a>
              		</li>
              		<li class="nav-item">
                	    <a class="nav-link text-{{ $color === 'white' ? 'dark' : 'white' }} opacity-8 text-sm pb-0" href="/register">
                  		Register
                	    </a>
              		</li>
            	    </ul>
          	</div>
            </div>
            <div class="col-lg-2 col-sm-4 col-12 text-lg-start text-center mb-sm-0 mb-4">
          	<div>
            	    <h6 class="text-{{ $color === 'white' ? 'dark' : 'white' }} text-sm mb-1">Packages</h6>
		    <ul class="flex-column ms-lg-n3 nav">
		    @foreach (\App\Models\Plan::all() as $i=>$plan)
              		<li class="nav-item {{ $i > 2 ? 'd-md-none d-lg-none' : '' }}">
                	    <a class="nav-link text-{{ $color === 'white' ? 'dark' : 'white' }} opacity-8 text-sm pb-0" href="javascript:;" target="_blank">
				{{ $plan->name }}
                	    </a>
			</li>
		    @endforeach 
            	    </ul>
          	</div>
            </div>
	</div>
	<div class="row">
	    <div class="col-md-12">
            <p class="text-center mt-5">
              <i class="fa fa-lock" aria-hidden="true"></i> Secured Payment methods include::
              <br><br>
              <i class="cf cf-btc fa-2x" aria-hidden="true"></i> <i class="cf cf-eth fa-2x ps-2" aria-hidden="true"></i> <i class="cf cf-bnb fa-2x ps-2" aria-hidden="true"></i> <i class="cf cf-lte fa-2x ps-2" aria-hidden="true"></i><i class="cf cf-doge fa-2x ps-2" aria-hidden="true"></i><i class="cf cf-ada fa-2x ps-2" aria-hidden="true"></i><i class="cf cf-usdt fa-2x ps-2" aria-hidden="true"></i>
            </p>
            <p class="text-center max-width-500 mx-auto">
            </p>
	  </div>
	</div>
    </div>
</footer>
