<div class="mb-lg-0 mb-4 {{ $class }}" id="addresses">
    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-12 d-flex align-items-center">
                    <h6 class="mb-0">Set up Google Authenticator</h6>
                </div>
                <div class="col-6 text-end d-none">
                    <button class="btn bg-gradient-dark mb-0" id="switch-coin-alt"><i class="fas fa-exchange-alt"></i>&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
	<div class="card-body p-3">
            <div class="row">
		<div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body" style="text-align: center;">
                    <p>Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code {{ $secret }}</p>
		    <div>
			{!! $image !!}
                    </div>
                    <p>By setting up 2FA, transactions on this platform will require the authentication code to proceed</p>
                    <form>
		    @csrf
                        <button type="button" id="submit" class="col-8 col-md-6 btn btn-twitter btn-icon">
			    <span class="btn-inner--icon">
				<i class="fas fa-key"></i>
			    </span>
    			    <span class="btn-inner--text">Set up 2FA</span>
		    	</button>
			<button class="col-8 col-md-6 btn btn-twitter btn-icon d-none" id="loading" type="button" disabled>
			    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			    <span >Setting up 2FA</span>
	    		</button>
		
		    </form>  

                </div>
            </div>
        </div>
		
		<div class="col-12 mx-auto">
		</div>
	    </div>
        </div>
    </div>
</div>
