$(document).ready(function () {
	var deposit = $("#deposit");
	var loading = $("#deposit-loading");
	var param = $("#deposit-param");
	var planId = param.attr('data-plan');
	var amount = param.attr('data-amount');
	var address = param.attr('data-address');
	var coinId = param.attr('data-coin');

	var hash = $("#hash");
	deposit.click(function () {
		showLoading(deposit, loading);

		$.ajax({
			type: "POST",
			url: "/client/deposit",
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			data: {
				amount: amount,
				transaction_hash: hash.val(),
				receiver_address: address,
				plan_id: planId,
				coin_id: coinId,
			},
			datatype: 'json',
			error: function (err) {
				var error = err.responseJSON;
				hideLoading(deposit, loading);
				handleCommonErrors(error);
			},
			success: function (data) {
				hideLoading(deposit, loading);
				Swal.fire(
					"Succesful",
					data.message,
					"success"
				);

				window.location.href = '/account';
			}
		});
	});
});
