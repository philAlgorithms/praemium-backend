$(document).ready(function () {
	var withdraw = $("#withdraw");
	var loading = $("#withdraw-loading");
	var amount = $('#withdrawal-amount');
	var coin = $('#withdrawal-coin');

	var hash = $("#hash");
	withdraw.click(function () {
		showLoading(withdraw, loading);
		$.ajax({
			type: "POST",
			url: "/client/withdrawal/submit",
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			data: {
				amount: amount.val(),
				crypto_currency: coin.val()
			},
			datatype: 'json',
			error: function (err) {
				var error = err.responseJSON; aJ(error);
				hideLoading(withdraw, loading);
				handleCommonErrors(error);
			},
			success: function (data) {
				hideLoading(withdraw, loading); aJ(data);
				Swal.fire(
					"Succesful",
					data.message,
					"success"
				);

				location.reload();
			}
		});
	});
});
