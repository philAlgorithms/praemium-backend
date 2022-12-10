var subscribe = $("#subscribe");
var subscribeLoading = $("#subscribe-loading");
var subscriptionAmount = $("#subscription-amount");
var subscriptionCoin = $("#subscription-coin");

subscribe.click(function () {
    var that = $(this);
    showLoading(subscribe, subscribeLoading);
    subscriptionCoin.val();
    $.ajax({
        type: "POST",
        url: "/client/deposit/subscribe",
        data: {
            amount: subscriptionAmount.val(),
            coin: subscriptionCoin.val(),
            plan: $("#subscription-plan").val()
        },
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
        error: function (err) {
            var error = err.responseJSON;
            aJ(error);
            hideLoading(that, subscribeLoading);
            handleCommonErrors(error);
        },
        success: function (data) {
            hideLoading(that, subscribeLoading);
            Swal.fire(
                'Successful',
                data.message,
                'success'
            );
            window.location.replace(data.data);
        }
    });
});
