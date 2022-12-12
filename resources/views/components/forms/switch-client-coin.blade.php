<div class="col-md-12 my-3 mx-auto">
    <div class="form-group">
	<label for="coin-switch">Change transaction cryptocurrency</label>
	<div class="input-group mb-4">
	<span class="input-group-text"><i id="coin-logo" class="cf cf-{{ firstCoin($coins, 'btc') }}"></i></span>
	    <select class="form-control" id="switch-coin">
	    @foreach ($coins as $i=>$coin)
	    	@php $selected = firstCoin($coins, 'btc')->id == $coin->id ? 'selected' : '' @endphp
	         <option value="{{ $coin->id }}" {{ $selected }}>{{ $coin->display_name }}</option>
    @endforeach
	    </select>
	    <span class="input-group-text"><i class="fas fa-exchange-alt"></i></span>
	</div>
    </div>
</div>

@foreach ($coins as $i=>$coin)
    <input type="hidden" id="coin-code-{{ $coin->id }}" value="{{ $coin->code }}">
@endforeach

@foreach ($coins as $i=>$coin)
    <input type="hidden" id="coin-name-{{ $coin->id }}" value="{{ $coin->name }}">
@endforeach

@foreach ($coins as $i=>$coin)
    <input type="hidden" id="coin-price-{{ $coin->id }}" value="{{ $prices[$coin->coinlib_name]['usd'] }}">
@endforeach

@foreach ($coins as $i=>$coin)
    <input type="hidden" id="coin-address-{{ $coin->id }}" value="{{ $coin->wallets(auth()->user()->id)->first()->address }}">
@endforeach

@foreach ($coins as $i=>$coin)
    <input type="hidden" id="coin-wallet-id-{{ $coin->id }}" value="{{ $coin->wallets(auth()->user()->id)->first()->id }}">
@endforeach

@foreach ($coins as $i=>$coin)
    <input type="hidden" id="coin-trust-{{ $coin->id }}" value="{{ $coin->trust_wallet_id }}">
@endforeach

@foreach ($coins as $i=>$coin)
    <input type="hidden" id="coin-lib-{{ $coin->id }}" value="{{ $coin->coinlib_id }}">
@endforeach

@foreach ($coins as $i=>$coin)
    <input type="hidden" id="coin-lib-name-{{ $coin->id }}" value="{{ $coin->coinlib_name }}">
@endforeach


