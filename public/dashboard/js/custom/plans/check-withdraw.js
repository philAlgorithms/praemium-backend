var withdraw = $("#withdraw");
var withdrawLoading = $("#withdraw-loading");
var withdrawalAmount = $("#withdrawal-amount");
var withdrawalCoin = $("#withdrawal-coin");

withdraw.click(function () {
    var that = $(this);
    showLoading(withdraw, withdrawLoading);
    withdrawalCoin.val();
    $.ajax({
        type: "POST",
        url: "/client/withdrawal/submit",
        data: {
            amount: withdrawalAmount.val(),
            crypto_currency: withdrawalCoin.val(),
            plan: $("#withdrawal-plan").val()
        },
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function (err) {
            var error = err.responseJSON;
            hideLoading(that, withdrawLoading);
            handleCommonErrors(error);
        },
        success: function (data) {
            hideLoading(that, withdrawLoading);
            Swal.fire(
                'Successful',
                data.message,
                'success'
            );
            window.location.replace('/account');
        }
    });
});
