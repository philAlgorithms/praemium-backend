<x-layouts.main :scripts=$scripts>
    <x-general.sticky-top>
	<x-navigations.topbar />
    </x-general.sticky-top>
    <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-6 col-md-8 col-12 px-5 d-flex flex-column">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left">
                <h3 class="text-info text-gradient">Reset Password</h3>
                <p class="mb-0">You will receive an e-mail in maximum 60 seconds</p>
              </div>
              <div class="card-body pb-3">
                <form>
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Enter your e-mail"  id="email" aria-label="Email">
                  </div>
                  <div class="text-center">
		    <button type="button" id="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Reset</button>
			
		    <button class="btn bg-gradient-primary w-100 mt-4 mb-0 d-none" id="btn-loading" type="button" disabled>
			<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  			<span id="load-text"> Please wait...</span>
		    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url({{ URL::asset('img/curved-images/curved6.jpg') }})"></div>
            </div>
          </div>
        	    </div>
      		</div>
    	</div>
    	<x-navigations.dashboard-footer />
    </section>
</x-layouts.main>
