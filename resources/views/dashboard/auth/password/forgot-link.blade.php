<x-layouts.main :scripts=$scripts>
    <x-general.sticky-top>
	<x-navigations.topbar />
    </x-general.sticky-top>
    <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-info text-gradient">Reset password</h3>
                <p class="mb-0">Enter new password to sign in</p>
              </div>
              <div class="card-body">
                <form>
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" id="email" class="form-control" placeholder="Email" aria-label="Email">
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" id="password" class="form-control" placeholder="Password" aria-label="Password">
		  </div>
		  <label>Confirm Password</label>
                  <div class="mb-3">
                    <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" aria-label="Password">

		  </div>
		  <input type="hidden" id="token" value="{{ $token }}">
                  <div class="text-center">
		    <button type="button" id="reset" class="btn bg-gradient-info w-100 mt-4 mb-0">Reset Password</button>

		    <button class="btn bg-gradient-primary w-100 mt-4 mb-0 d-none" id="loading" type="button" disabled>
			<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  			<span id="load-text"> Please wait...</span>
		    </button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                  Don't have an account?
                  <a href="/register" class="text-info text-gradient font-weight-bold">Sign up</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url({{ URL::asset('img/curved-images/curved8.jpg') }})"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<x-navigations.dashboard-footer />
    </section>
</x-layouts.main>
