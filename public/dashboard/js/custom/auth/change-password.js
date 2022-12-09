$(document).ready(function(){
    var submit = $("#submit");
    var loading = $("#loading");

    var token = $('[name="_token"]').val();

    submit.click(function(){
	showLoading($(this), loading);
	var thatBtn = $(this);
	
	$.ajax({
	    type:"POST",
	    url:"api/enable-otp",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    },
	    error: function(err){
		hideLoading(thatBtn, loading);
		var error = err.responseJSON;
 		checkCommonErrors(error);
	    },
	    data: {
		_token: token
	    },
	    success:function(data){
		hideLoading(thatBtn, loading);
		
		    Swal.fire(
      		    	'Successful',
      		    	data.message,
      		    	'success'
		    );
		window.location.href = "/profile";	
	    }
    	});
    });
});
