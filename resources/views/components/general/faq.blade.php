
<div class="accordion-item mb-3">
    <h5 class="accordion-header" id="heading{{ $id }}">
        <button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#{{$id}}" aria-expanded="false" aria-controls="{{ $id }}">
	    {!! $question !!}
            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3"></i>
            <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3"></i>
        </button>
    </h5>
    <div id="{{ $id }}" class="accordion-collapse collapse" aria-labelledby="{{ $id }}" data-bs-parent="#accordionRental">
	<div class="accordion-body text-sm opacity-8">
	    {!! $answer !!}
        </div>
    </div>
</div>
