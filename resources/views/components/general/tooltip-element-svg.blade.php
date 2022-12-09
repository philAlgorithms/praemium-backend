<li class="mb-2">
    <a href="{{ $link }}" class="dropdown-item border-radius-md">
        <div class="d-flex py-1">
	    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center my-auto">
		{{ $slot }}
	    </div>
	    <span class="nav-link-text d-flex glex-column justify-content-center ms-1 my-auto">{{ $text }}</span>
        </div>
    </a>
</li>
