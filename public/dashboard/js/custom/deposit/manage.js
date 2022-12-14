$(document).ready(function () {
	var submit = $("#confirm");
	var loading = $("#loading");
	var cancel = $("#cancel");

	var password = $("#password");
	var amount = $("#amount");
	var charge = $("#charge");
	var sender = $("#sender");
	var hash = $("#hash");
	var exchange = $("#exchange");
	var tid = $("#tid");
	var uuid = $("#uuid");
	var token = $('[name="_token"]').val();

	submit.click(function () {
		aJ({
			password: password.val(),
			amount: amount.val(),
			charge: charge.val(),
			sender_address: sender.val(),
			transaction_hash: hash.val(),
			exchange: exchange.val(),
			deposit_id: tid.val(),
			uuid: uuid.val()
		}, true);
		var thatBtn = $(this);

		showLoading($(this), loading);
		disableInput(cancel);

		$.ajax({
			type: "POST",
			url: "/admin/deposit/approve",
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				password: password.val(),
				amount: amount.val(),
				charge: charge.val(),
				sender_address: sender.val(),
				transaction_hash: hash.val(),
				deposit_id: tid.val(),
				_token: token
			},
			error: function (err) {
				var error = err.responseJSON;
				hideLoading(thatBtn, loading);
				enableInput(cancel);
				handleCommonErrors(error);
			},
			success: function (data) {
				hideLoading(thatBtn, loading);
				enableInput(cancel);
				Swal.fire(
					'Successful',
					data.message,
					'success'
				);
				location.reload();
			}
		});
	});

	cancel.click(function () {
		$("#confirm-deposit").modal('hide');
	});
});
