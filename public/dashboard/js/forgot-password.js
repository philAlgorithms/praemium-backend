$("body").ready(function(){
   var reg = $("#register");
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

    var fields = [ $("#email"), $("#phone_number"), $("#firstname"), $("#surname"), $("#username"), $("#password"), $("#confirm_password"), $("#country_id")];
    $.ajaxSetup({
    	headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
    });
var cid = 226 ; var phonecode=1;
    if (document.getElementById('country_id')) {
      	var country = document.getElementById('country_id');
	var telPrepend = $('#tel-prepend');
      	const countries = new Choices(country, {
	    allowSearch: true,
	    searchEnabled: true,
    	    searchChoices: true,
    	    searchFloor: 1,
    	    searchResultLimit: 4,
    	    searchFields: ['label', 'value'],
	    searchPlaceholderValue: 'Search Country',
	});
      	countries.setChoiceByValue('226|1');
      	country.addEventListener(
	    'change',
	    function(event) {
		cid = phonecode = stringBefore(this.value, '|');
		phonecode = stringAfter(this.value, '|');
		telPrepend.text('+' + phonecode);
	    },
	    false
	);
    }
   if (document.getElementById('gender')) {
      var gender = document.getElementById('gender');
      const example = new Choices(gender);
    }

  $("#register").click(function(){
    for(var i=0; i<fields.length; i++){
	var field = fields[i];
	field.removeClass("is-invalid");
    }
    showLoading();
    mail = $("#email").val();
    //$("#go-to-verify").click();

    checkConnectionLoss();
    $.ajax({
        type:"POST",
        url:"api/register",
	headers: {
            'Accept': 'application/json',
	    'XSRF-TOKEN': $('meta[name="_token"]').attr('content'),
	},
	data: {
	    username: $('#username').val(),
	    surname: $('#surname').val(),
	    firstname: $('#firstname').val(),
	    email: $('#email').val(),
	    phone_number: $('#phone_number').val(),
	    password: $('#password').val(),
	    confirm_password: $('#confirm_password').val(),
	    country_id: cid,
	    gender: $('#gender').val(),
	},
	datatype: 'json',
        error: function(err){
	   var error = err.responseJSON;
		hideLoading();aJ(error);
	    if(error.type === 'validation'){
		for(var key in error.data){
		     var info = error.data[key][0];
	      	     var k = key.substring(key.indexOf('.') + 1);
	      	     var message;
	      	     if(key.includes("client")){
	        	message = capFirst(k) + " " + info.substring(info.indexOf('must'));
	      	     }else if(info == "The password format is invalid."){
			info = "Password must cointain at least: a letter, a number and a character(Ex. #, !, ?...)";
		     }else{
			message = "This " + info.substring(info.indexOf('must'));
	      	    }
		    invalidate($('#'+key),info);
		    //showAlert('danger',error.data[key][0],'');
		}
	      //showAlert('warning','Incorrect email/password');
	}else{
	      showAlert('danger','Server error');
	  }
        },
        success:function(data){
	    showAlert('success','Login Successful');
		aJ(data);
		/*
	    Swal.fire("Registration Successful","A comfirmation code has been send to " + mail ,"success");
	    setTimeout(function(){
		hideLoading();
		$("#go-to-verify").click();
	    },2000);*/
	    //window.location.href = "/student-dashboard";
	},
    });

  });

    for(var j=0; j<fields.length; j++){
        valRegular(fields[j], "keyup");
    }

    $(".email-verify").on('keyup', function() {
        if ($(this).val()) {
            $(this).closest('.col').next().find('.email-verify').focus();
	}
    });

    $("#resend-code").click(function(){
	$.ajax({
        type:"POST",
        url:"/verify-email/request",
	headers: {
            'Accept': 'application/json',
	    'XSRF-TOKEN': $('meta[name="_token"]').attr('content'),
	},
	datatype: 'json',
        error: function(err){
	   var error = err.responseJSON;
		hideLoading();aJ(err);
	 
        },
        success:function(data){
	    Swal.fire("Email Sent", "Another verification email has been sent to " + mail, "success");
	},
	});
    });
});

