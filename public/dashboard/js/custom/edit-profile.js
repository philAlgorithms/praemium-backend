$(document).ready(function () {
	var coinId = stringBefore($("#switch-coin").val(), "|");;
	var coinLogo = $("#coin-logo");
	var token = $('[name="_token"]').val();
	var addBtn = $("#add-wallet");
	var loadBtn = $("#btn-loading");
	$("#switch-coin").change(function () {
		var code = stringAfter($(this).val(), "|");
		coinId = stringBefore($("#switch-coin").val(), "|");
		coinLogo.removeClass().addClass('cf cf-' + code);
	});

	$("#add-wallet").click(function () {
		showLoading(addBtn, loadBtn);
		$.ajax({
			type: "POST",
			url: "/auth/wallet/add",
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			error: function (err) {
				hideLoading(addBtn, loadBtn);

				var error = err.responseJSON;
				handleCommonErrors(error);
			},
			data: {
				coin_id: coinId,
				wallet_address: $("#wallet-address").val(),
				_token: token
			},
			success: function (data) {
				hideLoading(addBtn, loadBtn);
				Swal.fire("Successful", "New wallet added to account", "success");
			}
		});
	});

	$("#change-password").click(function () {
		var that = $(this);
		var load = $("#loading-password");

		Swal.fire({
			title: 'Are you sure?',
			text: "Password will be changed!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Change password'
		}).then((result) => {
			if (result.isConfirmed) {
				showLoading(that, load);
				$.ajax({
					type: "POST",
					url: "/auth/wallet/delete",
					headers: {
						'Accept': 'application/json',
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					},
					error: function (err) {
						hideLoading(that, load);
						var error = err.responseJSON;
						handleCommonErrors(error);
					},
					data: {
						current_password: $("#current_password").val(),
						new_password: $("#new_password").val(),
						confirm_password: $("#confirm_password").val(),
						otp: $("#otp").val(),
						_token: token
					},
					success: function (data) {
						hideLoading(that, load);
						Swal.fire(
							'Succesful!',
							'Password changed',
							'success'
						);

						clearFields();
					}
				});

			}
		});
	});

	$("#disable-otp").click(function () {
		Swal.fire({
			title: 'Enter your password',
			input: 'password',
			inputAttributes: {
				autocapitalize: 'off'
			},
			showCancelButton: true,
			confirmButtonText: 'Disable',
			showLoaderOnConfirm: true,
			preConfirm: (password) => {
				$.ajax({
					type: "POST",
					url: "/api/disable-otp/",
					headers: {
						'Accept': 'application/json',
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					},
					error: function (err) {
						var error = err.responseJSON;
						aJ(error, true);
						handleCommonErrors(error);
					},
					data: {
						password: password,
						_token: token
					},
					success: function (data) {
						aJ(data, true);
						Swal.fire(
							'Succesful',
							'2FA disabled.',
							'success'
						);
						location.reload();
					}
				});

			},
			allowOutsideClick: () => !Swal.isLoading()
		});
	});

	$("#add-wallet").click(function () {
		showLoading(addBtn, loadBtn);
		$.ajax({
			type: "POST",
			url: "api/add-wallet",
			headers: {
				'Accept': 'application/json',
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
			},
			error: function (err) {
				hideLoading(addBtn, loadBtn);

				var error = err.responseJSON;
				var data = error.data;
				handleCommonErrors(error);
			},
			data: {
				coin_id: coinId,
				wallet_address: $("#wallet-address").val(),
				_token: token
			},
			success: function (data) {
				hideLoading(addBtn, loadBtn);
				Swal.fire("Successful", "New wallet added to account", "success");
			}
		});
	});

	$("#p-v").click(function () {
		visible($("#current_password"));
	});
	$("#cp-v").click(function () {
		visible($("#confirm_password"));
	});
	$("#np-v").click(function () {
		visible($("#new_password"));
	});

});

