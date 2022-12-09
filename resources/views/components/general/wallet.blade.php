    <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
        <img class="w-10 me-3 mb-0" src="{{ cryptoSvgColor($wallet->coin->code) }}" alt="coin logo">
        <h6 class="mb-0 text-truncate">{{ $wallet->wallet_address }}</h6>&nbsp;&nbsp;
	{{ $slot }}
    </div>

