$("body").ready(function(){
   var reg = $("#reset");
   var loading = $("#loading");
    var mail;

    reg.click(function(){
	showLoading(reg, loading); 
	$.ajax({
        type:"POST",
        url:"/reset-password",
	headers: {
            'Accept': 'application/json',
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	},
	data: {
	    email: $("#email").val(),
	    password: $("#confirm_password").val(),
	    confirm_password: $("#confirm_password").val(),
	    token: $("#token").val(),
	},
	datatype: 'json',
        error: function(err){
	   var error = err.responseJSON;
		hideLoading(reg, loading);
		handleCommonErrors(error);
		aJ(error, true);
	 
        },
        success:function(data){
		aJ(data, true);
	    Swal.fire("Email Sent", "Password reset succesfully", "success");
	}
	});
    });
    
});

