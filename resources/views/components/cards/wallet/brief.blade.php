<div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
    <img class="w-10 me-3 mb-0" src="{{ cryptoSvgColor($coin->code) }}" alt="logo" style="">
    <h6 class="mb-0 text-truncate copy-text" data-copy-text="{{ $address }}">{{ $address }}</h6>
    {{ $slot }}
</div>
