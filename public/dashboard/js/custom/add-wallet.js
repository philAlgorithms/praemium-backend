$(document).ready(function(){
    var coinId = stringBefore($("#switch-coin").val(), "|");;
    var coinLogo = $("#coin-logo");
    var token = $('[name="_token"]').val();
    var addBtn = $("#add-wallet");
    var loadBtn = $("#btn-loading");
    $("#switch-coin").change(function(){
	var code = stringAfter($(this).val(), "|");
	coinId = stringBefore($("#switch-coin").val(), "|");
	coinLogo.removeClass().addClass('cf cf-' + code);
    });

    $("#add-wallet").click(function(){
	showLoading(addBtn, loadBtn);
	$.ajax({
	    type:"POST",
	    url:"api/add-wallet",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    },
	    error: function(err){
		hideLoading(addBtn, loadBtn);
		var error = err.responseJSON;
	        var data = error.data;
			
		if(error.type === 'validation'){
		    var message = data[Object.keys(data)[Object.keys(data).length - 1]];
		    Swal.fire({
		    	icon: 'error',
  		    	title: 'Error',
  		    	text: message
		    });
		}else{
		    var message = typeof(error.data) == 'string' ? error.data : 'Some error occurred. Please check internet connection';
		    Swal.fire({ 
		 	icon: 'error',
			title: 'Error',
			text: message
		    });
		}
	    },
	    data: {
		coin_id : coinId,
		wallet_address : $("#wallet-address").val(),
		_token: token
	    },
	    success:function(data){
		hideLoading(addBtn, loadBtn);
		Swal.fire("Successful", "New wallet added to account", "Success");
