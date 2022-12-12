@if ($formGroup)
<div class="form-group">
@endif
    <div class="input-group">
	@if(!is_null($prepend))
	<span class="input-group-text text-body">{{ $prepend }}</span>
	@endif
	<input type="{{ $type }}" 
	    @if(!is_null($id)) id="{{ $id }}" @endif 
	    class="form-control {{ $class }}" 
	    placeholder="{{ $placeholder }}" 
	    aria-label="{{ $placeholder }}" 
	    @if(!is_null($value)) value="{{ $value }}" @endif 
	    @foreach($attr as $attribute)
		{{ stringBefore($attribute, ',') }}="{{ stringAfter($attribute, ',') }}"
	    @endforeach >
	
	    @if (!is_null($append))
	<span class="input-group-text">{{ $append }}</span>
	@endif
    </div>
@if ($formGroup)
</div>
@endif
