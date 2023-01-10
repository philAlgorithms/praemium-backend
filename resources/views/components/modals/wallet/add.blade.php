<div class="modal fade" id="add-wallet-modal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-info text-gradient" id="wallet-header">Add Wallet</h3>
                        <p class="mb-0"></p>
                    </div>
                    <div class="card-body">
                        <form role="form text-left">
                            <label>Address</label>
                            <x-forms.input id="wallet-address" type="text" class="form-control-lg" placeholder="Wallet Address">
                                <x-slot:prepend><i class="fas fa-dollar-sign"></i></x-slot>
                            </x-forms.input>
                            <div class="form-group">
                                <label for="coins">Select Crypto Currency</label>
				<select class="form-control js-choice" id="wallet-coin">
                @php $coins = is_admin() ? \App\Models\CryptoCurrency::all() : acceptedCoins() @endphp
                @foreach ($coins as $i=>$coin)
                    <option value="{{ $coin->id }}" {{ $i===0 ? 'selected' : '' }}>{{ $coin->display_name }}</option>
                @endforeach
                </select>
			    </div>
			    <input type="hidden" id="wallet-url" value="{{ $url }}" />
                            <div class="text-center">
                                <x-forms.button.spinning
				    id="add-wallet"
				    class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
				    text="Proceed"
				/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
