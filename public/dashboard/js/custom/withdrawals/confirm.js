$(document).ready(function(){
    var confirmWithdrawal = $("#confirm-withdrawal");
    var loading = $("#confirm-withdrawal-loading");
    var param = $("#withdrawal-param");
    var uuid = param.attr('data-uuid');
    var amount = $("#withdrawal-amount");
    var senderAddress = $("#sender-address");
    var tx = $("#tx");
    var password = $("#password");

    confirmWithdrawal.click(function(){
	showLoading(confirmWithdrawal, loading);
	var withdrawalParam = {
	    uuid: uuid,
	    amount: amount.val(),
	    transaction_hash: tx.val(),
	    sender_address: senderAddress.val(),
	    password: password.val()
	};
	
	$.ajax({
	    type:"POST",
            url:"/account/withdrawals/confirm",
	    data: withdrawalParam,
	    datatype: 'json',
	    error: function(err){
		var error = err.responseJSON;aJ(error);
		hideLoading(confirmWithdrawal, loading);
		handleCommonErrors(error); 
	    },
	    success:function(data){aJ(data);
		hideLoading(confirmWithdrawal, loading);
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
