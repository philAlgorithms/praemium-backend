<div class="row">
    <div class="col-sm-2 col-3">
        <img class="img w-100 border-radius-lg shadow-lg" src="{{ $thumbnail }}" alt="curved11">
    </div>
    <div class="col-sm-10 col-9 my-auto">
	<h5>
            <a href="{{ $link }}" class="text-dark font-weight-bold">{{ $title }}</a>
        </h5>
        <p class="text-sm">
            {{ $text }}
        </p>
        <div class="buttons justify-content-center">
            <a href="{{ $link }}" class="btn btn-sm btn-rounded btn-dark btn-icon-only pt-1 mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Play video">
        	<i class="fa fa-play"></i>
            </a>
            <span class="font-weight-bold text-sm ms-2">{{ $length }}</span>
        </div>
    </div>
    <hr class="horizontal dark my-4">
</div>
