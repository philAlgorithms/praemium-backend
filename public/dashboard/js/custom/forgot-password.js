$("body").ready(function(){
   var reg = $("#submit");
   var loading = $("#btn-loading");
    var mail;
   function showLoading(){
	reg.addClass('d-none');
	loading.removeClass('d-none');
   }
    function hideLoading(){
	loading.addClass('d-none');
	reg.removeClass('d-none');
   }

    function valRegular(el,ev){
	el.on(ev, function(){
	    checkEmpty(el);
	})
    }

    reg.click(function(){
	showLoading(); 
	$.ajax({
        type:"POST",
        url:"/forgot-password",
	headers: {
            'Accept': 'application/json',
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	},
	data: {
	    email: $("#email").val(),
	},
	datatype: 'json',
        error: function(err){
	   var error = err.responseJSON;
		hideLoading();aJ(error, true);
	 
        },
        success:function(data){
		aJ(data, true);
	    Swal.fire("Email Sent", "Another verification email has been sent to " + mail, "success");
	}
	});
    });
    
});

