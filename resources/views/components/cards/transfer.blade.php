<div class="mb-lg-0 mb-4 {{ $class }}" id="addresses">
    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <h6 class="mb-0">Deposit Funds</h6>
                </div>
                <div class="col-6 text-end d-none">
                    <button class="btn bg-gradient-dark mb-0" id="switch-coin-alt"><i class="fas fa-exchange-alt"></i>&nbsp;&nbsp;SWITCH COIN</button>
                </div>
            </div>
        </div>
	<div class="card-body p-3">
            <div class="row">
	        <div class="col-md-12 mb-3 mx-auto">
		    <div class="form-group mb-4">
			<label for="deposit-amount">Enter receiver's username</label>
			<div class="input-group mb-1">
			    <span class="input-group-text"><i class="fas fa-user"></i></span>
			    <input type="text" class="form-control" placeholder="Enter username" id="user">
			</div>
      		    </div>
		</div>

		<input type="hidden" id="initial-coin" value="">
		<div class="col-md-12 mb-3 mx-auto">
		    <div class="form-group mb-4">
			<label for="deposit-amount">Enter amount in USD</label>
			<div class="input-group mb-1">
			    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
			    <input type="number" class="form-control" placeholder="Enter amount" id="amount" >
			</div>
			<div><span id="charge-container" class="{{ variable('TRANSFER_CHARGE') }}">{{ dollar(0) }}</span> service charge applies</div>
      		    </div>
		</div>
		<div class="col-md-12 mb-3 mx-auto">
		    <div class="form-group mb-4">
			<label for="password">Enter Password</label>
			<div class="input-group mb-1">
			    <span class="input-group-text"><i class="fas fa-lock"></i></span>
			    <input type="password" class="form-control" placeholder="Enter password" id="password">
			</div>
      		    </div>
		</div>
		<input type="hidden" id="charge-percentage" value="{{ variable('TRANSFER_CHARGE') }}">
		<div class="col-md-12 mb-3 mx-auto">
		    <div class="form-group mb-4">
			<label for="description">Description</label>
			<div class="input-group mb-1">
			    <span class="input-group-text"><i class="fas fa-edit"></i></span>
			    <input type="text" class="form-control" placeholder="Description (optional)" id="description">
			</div>
      		    </div>
		</div>


		<div class="col-12 mx-auto">
		    <form>
		    @csrf
                        <button type="button" id="transfer" class="col-8 col-md-6 btn btn-twitter btn-icon">
			    <span class="btn-inner--icon">
				<i class="fas fa-hand-holding-usd"></i>
			    </span>
    			    <span class="btn-inner--text">Transfer</span>
		    	</button>
			<button class="col-8 col-md-6 btn btn-twitter btn-icon d-none" id="loading" type="button" disabled>
			    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			    <span >Transfer</span>
	    		</button>
		
		    </form>  
		</div>
	    </div>
        </div>
    </div>
</div>
