$("body").ready(function(){

   var reg = $("#login");
   var loading = $("#btn-loading");
    var mail;
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#login").click(function(){
    showLoading(reg, loading);
	  
    $.ajax({
        type:"POST",
        url:"api/admin-login",
	headers: {
            'Accept': 'application/json',
	    'XSRF-TOKEN': $('meta[name="_token"]').attr('content'),
	},
	data: {
	    username: $('#username').val(),
	    password: $('#password').val(),
	    _token: $('[name="_token"]').val()
	},
	datatype: 'json',
        error: function(err){ 
aJ(err,true);
	  hideLoading(reg, loading);
	  if(err.responseJSON.message == "CSRF token mismatch"){
	      return location.reload();
	  }else if(err.responseJSON.type === 'validation'){
	      showAlert('warning','Incorrect username/password');
	      Swal.fire("Login Error", 'Incorrect username/password', 'danger');
	}else{
	      showAlert('danger','Server error');
		Swal.fire("Server Error", 'Please check internet connection', 'warning');
	  }
        },
        success:function(data){ 
	    Swal.fire("Login Succesful", 'Redirecting you to dashboard', 'success');
	    //setTimeout(hideAlert(),2000);
	    window.location.replace("/admin-dashboard");
	    //window.location.href = "/student-dashboard";
	},
    });
    
  });

});

