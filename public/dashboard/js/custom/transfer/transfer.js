$(document).ready(function(){

    var transferBtn = $("#transfer");
    var loading = $("#loading");
    var amount = $("#amount");
    var user = $("#user");
    var chargePercentage = $('#charge-percentage');
    var chargeDiv = $("#charge-container");
    var token = $("[name='_token']").val();
    var password = $("#password");

    var charges;

    function clearPage(){
	$("#amount").val() = 0 ;
	charges = 0;
	transfer = 0;
    }
   
    amount.keyup(function(){
	cost = $(this).val();

	charges = percentage(cost, chargePercentage.val());
	
	chargeDiv.text(dollar(charges));
    });

   
    transferBtn.click(function(){
	var thatBtn = $(this);
	    showLoading($(this), loading);
	    var req = {
	      amount: amount.val(),
	      username: user.val(),
	      password: password.val(),
              _token: token
            };
	
	$.ajax({
	    type:"POST",
	    url:"api/transfer-check",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    error: function(err){
		hideLoading(thatBtn, loading);
		var error = err.responseJSON;  //aJ(error);
		handleCommonErrors(error);	
	    },
	    data: {
	      amount: amount.val(),
	      username: user.val(),
	      password: password.val(),
	      description: $("#description").val(),
              _token: token
            },
	    datatype: 'json',
	    success:function(data){ 
		var req = data.data.request;
		var view = data.data.view
	    
		
		hideLoading(thatBtn, loading);
		Swal.fire({
	    	    title: 'Procced to transfer?',
  	    	    text: dollar(req.amount) + " will be transferred to "+view.name+"? "+dollar(req.charge)+" service charge will also be deducted.",
  	    	    iconHtml: '<img height="100" src="'+view.avatar+'">',
  	    	    showCancelButton: true,
  	    	    confirmButtonColor: '#3085d6',
  	    	    cancelButtonColor: '#d33',
  	    	    confirmButtonText: 'Continue'
		}).then((result) => {
  	    	    if (result.isConfirmed){

			showLoading(thatBtn, loading);
			
			$.ajax({
	    		    type:"POST",
	    		    url:"api/transfer",
	    		    headers: {
            			'Accept': 'application/json',
	    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    },
	    		    error: function(err){aJ(err.responseJSON, true);
				showLoading(thatBtn, payBtnLoading);
				location.reload();
			        //window.location.href = trustLink;
	    		    },
	    		    data: req,
	    		    success:function(data){
				hideLoading(thatBtn, loading);
				clearFields();
				Swal.fire("Request Sent","","success");
				location.reload();
				//window.location.href = trustLink;
	   		    },
			});
		    }
		});
	    }
	});
    });
});
