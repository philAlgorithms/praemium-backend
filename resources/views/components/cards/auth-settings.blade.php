<div class="col-md-6 mt-md-0 mt-4">
    <div class="card">
        <div class="card-header p-3 pb-0">
            <div class="d-flex align-items-center">
                <h6 class="mb-0">
                    Two factor authentication
		</h6>
	    @if (!auth()->user()->otp_enabled)
		<a href="enable-otp" class="btn btn-sm bg-gradient-dark ms-auto mb-0">
		    Enable
		</a>
	 
	    @else
                <button id="disable-otp" class="btn btn-sm bg-gradient-danger ms-auto mb-0">
		    Disable
		</button>
	    @endif
            </div>
        </div>
        <div class="card-body p-3">
            <p class="text-muted text-sm mb-4 mt-sm-5 mt-3">
                Two-factor authentication adds an additional
                layer of security to your account by requiring more
                than just a password in transactions.
            </p>
            <div class="card">
                <div class="card-body border-radius-lg bg-gradient-dark p-3">
                    <h6 class="mb-0 text-white">
                    Don't have the app yet?
                    </h6>
                    <p class="text-white text-sm mb-4">
                        Google authenticator helps to secure your account by generating an OTP every 30 seconds.
			Download the app on your OS and get started.	
		    </p>
		    <div class="button-row">
		        <a href="//play.google.com/store/apps/details?id=com.google.android.apps.authenticator2" class="btn btn-icon btn-3 bg-gradient-success" type="button">
			    <span class="btn-inner--icon"><i class="fab fa-google-play"></i></span>
  			    <span class="btn-inner--text">Get on Playstore</span>
		    	</a>
		    	<a href="//apps.apple.com/us/app/google-authenticator/id388497605" class="btn btn-icon btn-3 bg-gradient-light ms-auto" type="button">
			    <span class="btn-inner--icon"><i class="fab fa-app-store-ios"></i></span>
  			    <span class="btn-inner--text">Get on App store</span>
			</a>
		    </div>
		    
                </div>
            </div>
        </div>
    </div>
</div>
