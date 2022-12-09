<button type="button" 
    class="{{ $class }}" 
    id="{{ $id ?? '' }}"
    @foreach($attr as $attribute)
    {{ stringBefore($attribute, ',') }}="{{ stringAfter($attribute, ',') }}"
    @endforeach >{{ $text }}</button>
<button class="{{ $spinClass ?? $class }} d-none" id="{{ $id }}-loading" type="button" disabled>
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    <span > {{ $spinText }}</span>
</button>
