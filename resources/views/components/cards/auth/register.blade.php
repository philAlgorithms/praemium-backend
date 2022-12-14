<div class="col-lg-4 col-md-7">
    <div class="card z-index-0">
	<div class="card-header text-center pt-4">
	    <h5>Sign up for free</h5>
	</div>
	<div class="card-body">
	    <form role="form">
		<div class="mb-3">
		    <x-forms.input type="text" class="form-control" placeholder="Full name" aria-label="name" id="name">
			<x-slot:prepend><i class="fas fa-user"></i></x-slot>
		    </x-forms.input>
		</div>
		<div class="mb-3">
		    <x-forms.input type="text" class="form-control" placeholder="Username" aria-label="username" id="username">
			<x-slot:prepend><i class="fas fa-user"></i></x-slot>
		    </x-forms.input>
		</div>
		<div class="mb-0">
		    <x-forms.input type="email" class="form-control" placeholder="Email" aria-label="Email" id="email">
			<x-slot:prepend><i class="fas fa-envelope"></i></x-slot>
		    </x-forms.input>
		</div>

		<div class="form-group">
                    <label class="" for="country">Select Country</label>
		    <select class="form-control" id="country">
                    @foreach (\App\Models\Country::all() as $i=>$country)
                        <option value="{{ $country->id }}" {{ $i===225 ? 'selected' : '' }}>{{ $country->nicename }}</option>
                    @endforeach
                    </select>
		</div>
		<div class="mb-3">
		    <x-forms.input type="password" class="form-control" placeholder="Password" aria-label="Password" id="password">
			<x-slot:append><i class="fas fa-eye toggle-visibility"></i></x-slot>
		    </x-forms.input>
		</div>
		<div class="mb-3">
		    <x-forms.input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password" id="confirm-password">
			<x-slot:append><i class="fas fa-eye toggle-visibility"></i></x-slot>
		    </x-forms.input>
		</div>
		@if (Session::has('ref'))
		<div class="mb-3 col-md-6">
		    <label>Referrer</label>
		    <input type="text" class="form-control" id="ref" placeholder="Referrer" aria-label="Ref" value="{{ session('ref')->username }}" disabled>
		    <div class="invalid-feedback"></div>
		</div>
		<input type="hidden" id="refId" value="{{ session('ref')->id }}" disabled>
		@endif
		<p class="text-danger">Passwords must be at least 8 characters long contain a number, a lowercase letter, an uppercase letter</p>

		<div class="form-check form-check-info text-start">
		    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
		    <label class="form-check-label" for="flexCheckDefault">
			I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
		    </label>
		</div>
		<div class="text-center">
		    <x-forms.button.spinning
		     id="signup"
		     class="btn bg-gradient-dark w-100 my-4 mb-2"
		     text="Proceed"
		     />
		</div>
		<p class="text-sm mt-3 mb-0">Already have an account? <a href="/login" class="text-dark font-weight-bolder">Sign in</a></p>
	    </form>
	</div>
    </div>
</div>
