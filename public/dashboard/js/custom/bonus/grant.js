$(document).ready(function () {
	var grant = $("#grant");
	var loading = $("#grant-loading");
	var planId = $('#plan');
	var clientId = $('#client');
	var amount = $('#amount');

	grant.click(function () {
		showLoading(grant, loading);

		$.ajax({
			type: "POST",
			url: "/admin/bonus/grant",
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			data: {
				amount: amount.val(),
				plan: planId.val(),
				client: clientId.val(),
			},
			datatype: 'json',
			error: function (err) {
				hideLoading(grant, loading);
				var error = err.responseJSON;
				handleCommonErrors(error);
			},
			success: function (data) {
				hideLoading(grant, loading);
				Swal.fire(
					"Succesful",
					data.message,
					"success"
				);

				window.location.href = '/account/admin';
			}
		});
	});
});