$("body").ready(function () {
	var reg = $("#reset");
	var loading = $("#loading");
	var mail;

	reg.click(function () {
		showLoading(reg, loading);
		$.ajax({
			type: "POST",
			url: "/reset-password",
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			data: {
				email: $("#email").val(),
				password: $("#password").val(),
				confirm_password: $("#confirm_password").val(),
				token: $("#token").val(),
			},
			datatype: 'json',
			error: function (err) {
				var error = err.responseJSON;
				hideLoading(reg, loading);
				handleCommonErrors(error);
				aJ(error, true);

			},
			success: function (data) {
				aJ(data, true);
				Swal.fire("Success", "Password reset succesfully", "success");

				window.location.href = "/login";
			}
		});
	});

});

