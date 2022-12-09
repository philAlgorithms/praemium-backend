$(document).ready(function(){
    var cid = $('#cid');
    var rA = $('#rA');
    var sA = $('#sA');
    var am = $('#am');
    var ex = $('#ex');
    var link = $('#link');
    var cn = $('#client-notified');
    var stat = $("#stat");
    var loadingBtn = $("#btn-loading");
    var submit = $("#btn-proceed");
    var cancel = $('#btn-cancel');

    var notify = false;
    var token = $('[name="_token"]').val();

   if (document.getElementById('stat')) {
      	var statu = document.getElementById('stat');
      	const stats = new Choices(statu);
   };
	
    if (document.getElementById('cid')) {
      	var users = document.getElementById('cid');
      	const usersChoices = new Choices(users, {
	    allowSearch: true,
	    searchEnabled: true,
    	    searchChoices: true,
    	    searchFloor: 1,
    	    searchResultLimit: 4,
    	    searchFields: ['label', 'value'],
	    searchPlaceholderValue: 'Search Client',
	});
    }

    if (document.getElementById('rA')) {
      	var rAs = document.getElementById('rA');
      	const receivers = new Choices(rAs, {
	    allowSearch: true,
	    searchEnabled: true,
    	    searchChoices: true,
    	    searchFloor: 1,
    	    searchResultLimit: 4,
    	    searchFields: ['label', 'value'],
	    searchPlaceholderValue: 'Search Address',
	});
    }

    submit.click(function(){
	showLoading(submit, loadingBtn);
	disableInput(cancel);

	$.ajax({
	    type:"POST",
	    url:"api/add-deposit",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    },
	    error: function(err){aJ(err.responseJSON);
		hideLoading(submit, loadingBtn);
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
		client_id: cid.val(),
		receiver_wallet_id: rA.val(),
		sender_address: sA.val(),
		amount: am.val(),
		means: ex.val(),
		status_id: stat.val(),
		link: link.val(),
		notification: $("#notif").val(),
		notify: notify,
		_token: token
	    },
	    success:function(data){ aJ(data);
		hideLoading(submit, loadingBtn);
		clearFields();
		Swal.fire(
      		    'Successful',
      		    'The deposit upload us successful.',
      		    'success'
    		);
	    }
    	});
	
    });

    cn.click(function(){
	notify = this.checked;
    });
});
