$(document).ready(function(){
   var submit = $("#upload");
    var loading = $("#upload-loading");
    var cancel = $("#upload-cancel");

    var coins = $("#coins");
    var wallets = $("#wallets");
    var proof = $("#proof");

    var password = $("#upload-password");
    var amount = $("#upload-amount");
    var sender = $("#upload-sender");
    var hash = $("#upload-hash");
    var exchange = $("#upload-exchange");

    var token = $('[name="_token"]').val();

    coins.change(function(){
	var that = $(this);
	var cid = that.val();
	var clogo = $("#logo-"+cid).val();

	var req = new FormData();
	$(".cl").each(function(i,obj){
	    $(this).children(':first').removeClass().addClass('cf cf-'+clogo);
	});

	var newWallets = new Array;
	$(".wallet-"+cid).each(function(i,obj){
	    var walletObj = {
		id: $(this).attr('id'),
		address: $(this).val()
	    };
	    newWallets.push(walletObj);
	});

	wallets.empty();
	for(var i in newWallets){
	    wallets.append('<option value="' + newWallets[i]['id'] + '">' + newWallets[i]['address'] + '</option>');
	}
    });

    submit.click(function(){
	var thatBtn = $(this);
	var req = new FormData();
	var file = proof[0].files[0];

	var db = {
	    password: password.val(),
	    amount: amount.val(),
	    sender_address: sender.val(),
	    receiver_wallet_id: wallets.val(),
	    hash: hash.val(),
	    means: exchange.val(),
	};
	req.append('proof', file);
	for (var key in db) {
	    req.append(key, db[key]);
	}
	req.append('_token', token);
    
        showLoading($(this), loading);
	disableInput(cancel);

	$.ajax({
	    type:"POST",
	    url:"api/no-trust-deposit",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    processData: false,
	    contentType: false,
	    data: req,
	    error: function(err){ 
	    	var error = err.responseJSON;  aJ(error);
		hideLoading(thatBtn, loading);
		enableInput(cancel);
		handleCommonErrors(error);
	    },
	    success:function(data){
		     aJ(data);
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
	$("#upload-deposit").modal('hide');
   });
});
