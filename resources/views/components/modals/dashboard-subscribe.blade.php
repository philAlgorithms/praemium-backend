<div class="modal fade" id="subscribe-modal" tabindex="-1" role="dialog" aria-labelledby="modal-form"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-left">
                        <h3 class="font-weight-bolder text-info text-gradient" id="subscription-header"></h3>
                        <p class="mb-0"></p>
                    </div>
                    <div class="card-body">
                        <form role="form text-left">
                            <label>Amount</label>
                            <div class="input-group">
                                <span class="input-group-text" id="addon1"><i class="fa fa-dollar-sign"></i></span>
                                <input type="number" class="form-control " id="subscription-amount"  placeholder="Amount" aria-label="Amount" aria-describedby="addon1">
                            </div>
                            <div class="form-group">
                                <label for="coins">Select Crypto Currency</label>
                                <select class="form-control" id="subscription-coin">
                                @foreach (acceptedCoins() as $i=>$coin)
                                    <option value="{{ $coin->id }}" {{ $i===0 ? 'selected' : '' }}>{{ $coin->trivial_name }}</option>
                                @endforeach
                                </select>
			    </div>
			    <input type="hidden" id="subscription-plan" />
                            <div class="text-center">
                                <x-forms.button.spinning
				    id="subscribe"
				    class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"
				    text="Proceed"
                    />
				{{--
                <button class="btn bg-gradient-primary w-100 mt-4 mb-0 d-none" id="btn-loading" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                      <span id="load-text"> Please wait...</span>
                    </button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
