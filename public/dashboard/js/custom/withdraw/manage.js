$(document).ready(function(){
   var submit = $("#accept");
    var loading = $("#loading");
    var cancel = $("#cancel");

    var password = $("#password");
    var amount = $("#amount");
    var charge = $("#charge");
    var sender = $("#sender");
    var hash = $("#hash");
    var exchange = $("#exchange");
    var tid = $("#tid");
   	var token = $('[name="_token"]').val();
	
    submit.click(function(){
	aJ({
	    password: password.val(),
	    amount: amount.val(),
	    charge: charge.val(),
	    sender: sender.val(),
	    hash: hash.val(),
	    exchange: exchange.val(),
	    id: tid.val()
	});
	var thatBtn = $(this);

    showLoading($(this), loading);
	disableInput(cancel);

	$.ajax({
	    type:"POST",
	    url:"/admin/withdrawal/approve",
	    headers: {
            'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    data: {
			password: password.val(),
	    	amount: amount.val(),
	    	charge: charge.val(),
	    	sender_address: sender.val(),
	    	hash: hash.val(),
	    	exchange: exchange.val(),
	    	withdrawal_id: tid.val(),
			_token: token
	   	},
	    error: function(err){ aJ(err,true);
	    	var error = err.responseJSON;
			hideLoading(thatBtn, loading);
			enableInput(cancel);
			handleCommonErrors(error);
	    },
	    success:function(data){
		    aJ(data,true);
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

cancel.click(function(){
	$("#accept-withdrawal").modal('hide');
   });
});
