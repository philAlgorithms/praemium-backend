<ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
@foreach (auth()->user()->notifications as $i=>$notification)
    @if ($i >3) @break @endif
    <li>
    	<a class="dropdown-item border-radius-md" href="{{ $notification->data['url'] }}">
            <div class="d-flex py-1">
                <div class="avatar avatar-sm bg-gradient-{{ $notification->data['color'] }}  me-3  my-auto">
                    <i class="{{ $notification->data['icon'] }}"></i> 
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-normal mb-1">
			{{ $notification->data['text'] }}
                    </h6>
                    <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
			{{ time_elapsed_string($notification->created_at) }}
		    </p>
                </div>
            </div>
        </a>
    </li>
@endforeach
    <li class="text-center">
	<a class="dropdown-item border-radius-md" href="#">
	    View all
	</a>
    </li> 
</ul>
