<div class="card card-plain text-start">
	<div class="card-header pb-0 text-left">
		<h3 class="font-weight-bolder text-info text-gradient"></h3>
	    <p>This confirmation is irreversible!</p>
	</div>
	<div class="card-body">
	    <form role="form text-left">
			@csrf
			<input type="hidden" class="pid" value="{{ $withdrawal->id }}" >
			<div class="form-group">
				<label>Client name</label>
				<div class="input-group">
				<span class="input-group-text" id="addon1"><i class="fa fa-text"></i></span>
				<input type="text" class="form-control edit-withdrawal-name" value="{{ $withdrawal->transaction->client->name }}" disabled aria-describedby="addon1">
				</div>
			</div>

			<div class="form-group">
				<label>Amount withdrawn</label>
				<div class="input-group">
				<span class="input-group-text" id="addon2">$</span>
					<input type="number" class="form-control" id="amount" value="{{ $withdrawal->transaction->amount }}" placeholder="Amount withdrawan" aria-label="Plan cost" aria-describedby="addon2">
				</div>
			</div>

		{{-- <div class="form-group">
		    <label>Charges</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon5">$</span>
			<input type="number" class="form-control" id="charge" value="{{ $withdrawal->transaction->charge }}" placeholder="Maximum cost" aria-label="charge" disabled aria-describedby="addon5">
		    </div>
		</div> --}}

		<div class="form-group">
		    <label>Sender address</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon3"><i class="cf cf-{{ $withdrawal->transaction->coin->code }}"></i></span>
			<input type="text" class="form-control" id="sender" value="" placeholder="Sender address" aria-label="Inrerest roi" aria-describedby="addon3">
		    </div>
		</div>
		<div class="form-group">
		    <label>Receiver address</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon3"><i class="cf cf-{{ $withdrawal->transaction->coin->code }}"></i></span>
			<input type="text" class="form-control" id="receiver" value="{{ $withdrawal->transaction->receiver_address }}" disabled  aria-describedby="addon3">
		    </div>
		</div>

		<div class="form-group">
		    <label>Blockchain hash</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon3"><i class="cf cf-{{ $withdrawal->transaction->coin->code }}"></i></span>
			<input type="text" class="form-control" id="hash" value="" placeholder="Blockchain hash" aria-label="hash" aria-describedby="addon3">
		    </div>
		</div>
		{{-- <div class="form-group">
		    <label>Exchange</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon9"><i class="cf cf-{{ $withdrawal->transaction->coin->code }}"></i></span>
			<input type="text" class="form-control" id="exchange" placeholder="Exchange platform" aria-label="exchange" aria-describedby="addon9">
		    </div>
		</div> --}}
		<input type="hidden" id="tid" value="{{ $withdrawal->id }}">
		{{-- <input type="hidden" id="uuid" value="{{ $withdrawal->transaction->uuid }}"> --}}
		{{-- <div class="form-group">
		    <label for="address">Enter password to proceed</label>
		    <div class="input-group mb-4">
          		<input type="password" class="form-control" id="password" placeholder="Enter password">
        	    </div>
      		</div> --}}
		<div class="text-center">
		    <div class="button-row d-flex mt-4">
			<button class="btn bg-gradient-light mb-0" id="cancel" type="button" title="Cancel">Cancel</button>
			<button class="btn bg-gradient-dark ms-auto mb-0" id="accept" type="button" title="Next">Proceed</button>
			<button class="btn bg-gradient-dark ms-auto mb-0 d-none" id="loading" type="button" disabled>
		            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		            <span id="load-text">Processing</span>
		        </button>
		    </div>
		</div>
	    </form>
    	</div>
    </div>

