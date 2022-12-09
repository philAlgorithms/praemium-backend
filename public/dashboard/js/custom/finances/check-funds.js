$(document).ready(function(){
    var submit = $(".check-btn");
    //var loading = submit.closest(".loading-btn");
    //var cancel = $('#btn-cancel');

    var token = $('[name="_token"]').val();

    submit.click(function(){
	var loading = $(this).closest(".card-pricing").find(".loading-btn");
	hideLoading(submit, $(".loading-btn"));
	showLoading($(this), loading);
	var thatBtn = $(this);
	var cost = $(this).closest(".card-pricing").find(".plan-cost").val();
	var modal = $(this).closest(".card-pricing").find(".subscribe-modal");
	
	$.ajax({
	    type:"GET",
	    url:"api/check-current-balance",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    },
	    error: function(err){
		hideLoading(thatBtn, loading);
		var error = err.responseJSON;aJ(error);
 		checkCommonErrors(error);
	    },
	    data: {
		_token: token
	    },
	    success:function(data){ ;
		var balance = Number(data);
		hideLoading(thatBtn, loading);
		if(balance==0){
		    Swal.fire(
      		    	'Successful',
      		    	'Vabbé',
      		    	'No funds'
		    );
		}else if(balance < Number(cost)){
		    Swal.fire({ 
		 	icon: 'error',
			title: 'Error',
			text: 'Insufficient funds'
		    });
	
		}else if(balance >= Number(cost)){
		    modal.modal('show');
		}
	    }
    	});
    });
});
