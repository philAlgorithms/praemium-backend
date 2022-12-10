<div class="col-lg-9 col-12 mx-auto">
    <div class="card card-body mt-4">
        <h6 class="mb-0">Upload Deposit</h6>
        <p class="text-sm mb-0 d-none">Create new project</p>
        <hr class="horizontal dark my-3">

	<div class="row">
	    <div class="col-12">
		<label class="mt-4 form-label">Client</label>
		<select class="form-control" name="choices-multiple-remove-button" id="cid">
	    	    <option value="" selected>Select Client</option>
		</select>
	    </div>
	    <div class="col-md-6">
		<label for="sA" class="mt-4 form-label">Sender Address</label>
		<input type="text" class="form-control" placeholder="Enter sender's address" id="sA">
	    </div>
	    <div class="col-md-6">
		<label for="rA" class="mt-4 form-label">Receiver Address</label>
		<select class="form-control" name="choices-multiple-remove-button" id="rA">
	    	    <option value="" selected>Select Address</option>
		@foreach ($adminWallets as $wallet)
            	    <option value="{{ $wallet->id }}">{{ '['.$wallet->coin->display_name.']  '.$wallet->address }}</option>
        	@endforeach
		</select>
	    </div>
	    <div class="col-md-6">
		<label for="am" class="mt-4 form-label">Amount</label>
		<input type="number" class="form-control" placeholder="Enter Amount" id="am">
	    </div>
	    <div class="col-md-6 d-none">
		<label for="date" class="mt-4 form-label">Time of Transaction</label>
		<input type="datetime-local" class="form-control" placeholder="Enter Date" id="date">
	    </div>
	    <div class="col-md-6">
		<label for="ex" class="mt-4 form-label">Exchange</label>
		<input type="text" class="form-control" placeholder="Ex. (Mycelium, Trust Wallet...)" id="ex">
	    </div>
	    <div class="col-md-6">
		<label for="stat" class="mt-4 form-label">Status</label>
		<select class="form-control" name="choices-multiple-remove-button" id="stat">
	    	    <option value="" selected>Transaction status</option>
		@foreach (\App\Models\Status::all() as $status)
		    <option value="{{ $status->id }}">{{ $status->name }}</option>
        	@endforeach
		</select>
	    </div>
	    <div class="col-md-6">
		<label for="link" class="mt-4 form-label">Blockchain Link</label>
		<input type="text" class="form-control" placeholder="Enter Link" id="link">
	    </div>
	    <div class="col-md-4">
	    	<p class="form-text text-muted text-xs ms-1">    
                </p>
                <div class="form-check form-switch ms-1">
                    <input class="form-check-input" type="checkbox" id="client-notified" onclick="notify(this)" data-type="warning" data-content="Client will be notified by app notification and by email" data-title="Notice" data-icon="ni ni-bell-55">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Notify Client</label>
                </div>
	    </div>
	    <div class="col-md-8">
		<label for="notif" class="mt-4 form-label d-none">Notification message</label>
		<textarea class="form-control mt-4" placeholder="Enter notification messsge..." id="notif"></textarea>
	    </div>
	</div>

        <div class="d-flex justify-content-end mt-4">
            <button type="button" name="button" class="btn btn-light m-0" id="btn-cancel">Cancel</button>
	    <button type="button" name="button" class="btn bg-gradient-primary m-0 ms-2" id="btn-proceed">Upload Deposit</button>

	    <button class="btn bg-gradient-primary m-0 ms-2 d-none" id="btn-loading" type="button" disabled>
		<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		<span id="load-text">Upload Deposit</span>
	    </button>
	</div>
    </div>
</div>
