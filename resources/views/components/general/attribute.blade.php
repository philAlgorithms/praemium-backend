<?/*
<div class="col-md-6 mt-3">
    <div class="info">
	<div class="icon icon-sm">
            {{ $icon }}
        </div>
        <h5 class="font-weight-bolder mt-3">{{ $title }}</h5>
        <p class="pe-3">{{ $slot }}</p>
    </div>
</div>
*/?>
<div class="col-lg-3 col-md-6">
    <div class="info">
        <div class="icon icon-shape text-center mx-auto">
	    {{ $icon }}
        </div>
        <h5 class="mt-2">{{ $title }}</h5>
<p>{{ $slot }}</p>
    </div>
</div>
