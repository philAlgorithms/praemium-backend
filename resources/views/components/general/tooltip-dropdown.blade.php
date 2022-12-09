<div class="{{ $dropdown === true ? 'dropdown' : ''}} {{ $class }}" id="x">
    <a href="javascript:;" class="nav-link text-body p-0 {{ $class2 }}" id="customDropdown" data-bs-toggle="dropdown" aria-expanded="false">
	<i class="{{ $icon }} text-{{ $iconColor }} text-lg" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $title }}"></i>
    </a>
@if ($dropdown === true)
    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="customDropdown">
	{{ $slot }}
    </ul>
@endif
</div>
            
