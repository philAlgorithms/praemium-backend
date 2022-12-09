<div class="card card-plain multisteps-form__panel" data-animation="FadeIn">
    <div class="card-header pb-0 text-left">
        <h3 class="font-weight-bolder text-primary text-gradient">Verify Email</h3>
        <p class="mb-0">A verification email has been sent to {{ $email }}. Please click on the link to activate your account</p>
    </div>

    <div class="card-body pb-3 multisteps-form__content">
	<div class="info mb-4">
	    <div class="icon icon-shape icon-xl rounded-circle bg-gradient-warning shadow text-center py-3 mx-auto my-auto pt-4">
		<x-svg.spaceship size="40" />
            </div>
        </div>
        <div class="text-center text-muted mb-4">
            <h2>Email Verification</h2>
	</div>

        <div class="text-center">
            <button type="button" class="btn bg-gradient-warning w-100 d-none">Send code</button>
            <span class="text-muted text-sm">Haven't received it?<a href="javascript:;" id="resend-code"> Resend a new email</a>.</span>
        </div>
    </div>
    <div class="card-footer">
	{{ $footer }}
    </div>
</div>
