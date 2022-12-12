$(document).ready(function(){
    var add = $("#add-wallet");
    var loading = $("#add-wallet-loading");
    var address = $("#wallet-address");
    var coin = $("#wallet-coin");
    var url = $("#wallet-url").val();
     
    add.click(function(){
	var that = $(this);
	showLoading(that, loading);

	$.ajax({
	    type:"POST",
            url: url,
	    data: {
		address: address.val(),
		crypto_currency: coin.val(),
	    },
	    datatype: 'json',
	    error: function(err){
		var error = err.responseJSON;
		hideLoading(that, loading);
		handleCommonErrors(error); 
	    },
	    success:function(data){
		hideLoading(that, loading);
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
