<div class="col-md-6 mt-4 mt-md-0 mt-lg-0">
    <div class="card">
        <div class="card-header p-3 pb-0">
            <h6 class="mb-1">Change password</h6>
	    <p class="text-sm mb-0">
		@if (auth()->user()->otp_enabled)
		  Use your Google Authenticator app to get the OTP.
		@endif
            </p>
        </div>
        <div class="card-body p-3">
            <label class="form-label">Current password</label>
        	<div class="input-group">
		    <input class="form-control" type="password" placeholder="Current password" id="current_password">
		    <span class="input-group-text visible" id="p-v"><i class="fas fa-eye"></i></span>
			                    
              	</div>
              	<label class="form-label">New password</label>
              	<div class="input-group">
		    <input class="form-control" type="password" placeholder="New password" id="new_password">
		    <span class="input-group-text visible" id="np-v"><i class="fas fa-eye"></i></span>
			                    
              	</div>
              	<label class="form-label">Confirm new password</label>
              	<div class="input-group">
		    <input class="form-control" type="password" placeholder="Confirm password" id="confirm_password">
		    <span class="input-group-text visible" id="cp-v"><i class="fas fa-eye"></i></span>
			                    
		</div>
	@if (auth()->user()->otp_enabled)
		<label class="form-label">Authenticator OTP</label>
              	<div class="form-group">
                    <input class="form-control" type="number" id="otp" placeholder="Enter OTP">
		</div>

	@else
	    <input type="hidden" id="otp" value="0">
	@endif
              	<button class="btn bg-gradient-dark w-100 mb-0" id="change-password">Update password</button>

		<button class="btn bg-gradient-dark w-100 mb-0 btn-icon d-none" id="loading-password" type="button" disabled>
		    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		    <span > Update Password</span>
	    	</button>
		
	    </div>
        </div>
    </div>
