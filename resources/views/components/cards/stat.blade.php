<div class="{{ $class }}">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    	<p class="text-sm mb-0 text-capitalize font-weight-bold">{{ $text }}</p>
                    	<h5 class="font-weight-bolder mb-0">
                      	    {{ $amount }}
                            <span class="text-{{ capState($increment) }} text-sm font-weight-bolder">{{ $increment }}</span>
                    	</h5>
		    </div>
		</div>
		<x-icons.stat
		    class="col-4 text-end"
		    :icon=$icon
		/>
	    </div>
        </div>
    </div>
</div>
 
