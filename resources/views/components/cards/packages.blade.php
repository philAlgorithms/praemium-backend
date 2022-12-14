<section class="py-5">
    <div class="container">
    	<div class="row">
      	    <div class="col-md-8 mx-auto text-center">
        	<h2>Explore the best plans for you</h2>
        	<p><a href="/register" >Register now</a> and start earning from your investments</p>
      	    </div>
    	</div>
	<div class="row">
	@foreach (\App\Models\Plan::all() as $i=>$plan)
	    <x-cards.package :plan=$plan class="col-md-6 col-lg-4 mb-4" />
	    @if ($i > 2) @break @endif
	@endforeach
	</div>
    </div>
</section>
   
