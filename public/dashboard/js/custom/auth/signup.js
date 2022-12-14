$(document).ready(function () {
	var signup = $("#signup");
	var loading = $("#signup-loading");
	var name = $("#name");
	var username = $("#username");
	var email = $("#email");
	var country = $("#country");
	var password = $("#password");
	var confirmPassword = $("#confirm-password");

	signup.click(function () {
		var that = $(this);
		showLoading(that, loading);
		$.ajax({
			type: "POST",
			url: "/auth/signup",
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				name: name.val(),
				username: username.val(),
				email: email.val(),
				country: country.val(),
				password: password.val(),
				password_confirmation: confirmPassword.val(),
			},
			datatype: 'json',
			error: function (err) {
				var error = err.responseJSON;
				aJ(error);
				handleCommonErrors(error);
				hideLoading(that, loading);
			},
			success: function (data) {
				hideLoading(that, loading);
				Swal.fire(
					"Succesful",
					data.message,
					"success"
				);
				window.location.replace("/account");
			}
		});
	});
});
