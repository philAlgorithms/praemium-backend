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
				var data = error.data;

				aJ(error);
				// handleCommonErrors(error);
				if (error.type === 'validation') {
					var message = data[Object.keys(data)[Object.keys(data).length - 1]];
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: message
					});
				} else {
					var message = typeof (error.data) == 'string' ? error.data : 'Some error occurred. Please check internet connection';
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: message
					});
				}
			},
			data: {
				coin_id: coinId,
				wallet_address: $("#wallet-address").val(),
				_token: token
			},
			success: function (data) {

				hideLoading(addBtn, loadBtn);
				Swal.fire("Successful", "New wallet added to account", "Success");
			}
		});
	});

	$(".delete-wallet").click(function () {
		var that = $(this);
		var wid = stringAfter($(this).attr('id'), '-');
		alert(wid);
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "/auth/wallet/delete/" + wid,
					headers: {
						'Accept': 'application/json',
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
					},
					error: function (err) {
						var error = err.responseJSON; aJ(error);
						var data = error.data;

						if (error.type === 'validation') {
							var message = data[Object.keys(data)[Object.keys(data).length - 1]];
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: message
							});
						} else {
							var message = typeof (error.data) == 'string' ? error.data : 'Some error occurred. Please check internet connection';
							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: message
							});
						}
					},
					data: {
						_token: token
					},
					success: function (data) {
						Swal.fire(
							'Deleted!',
							'This address has been deleted.',
							'success'
						);

						that.closest(".wallet-wrapper").remove();
					}
				});

			}
		});
	});
});