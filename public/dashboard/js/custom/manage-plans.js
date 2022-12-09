$(document).ready(function(){
    var edit = $(".edit");
    var deleteBtn = $(".delete");
    //var loading = edit.closest(".loading-btn");
    //var cancel = $('#btn-cancel');

    var token = $('[name="_token"]').val();

    var thisCard;
    edit.click(function(){
	var loading = $(this).closest(".card-pricing").find(".loading-edit");
	hideLoading(edit, $(".loading-edit"));
	showLoading($(this), loading);
	var thatBtn = $(this);
	var cost = $(this).closest(".card-pricing").find(".plan-cost").val();
	var modal = $(this).closest(".card-pricing").find(".edit-modal");
	modal.modal('show');
	hideLoading($(this), loading);
	    /*
	$.ajax({
	    type:"GET",
	    url:"api/check-current-balance",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    },
	    error: function(err){
		hideLoading(thatBtn, loading);
		//var error = err.responseJSON;
 		Swal.fire({ 
		    icon: 'error',
		    title: 'Error',
		    text: 'Some error occurred. Please check internet connection'
		});

	/*       var data = error.data;
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
		}*
	    },
	    data: {
		_token: token
	    },
	    success:function(data){
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
    	});*/
    });

    deleteBtn.click(function(){
	thisCard = $(this).closest(".card-pricing");
	var loading = thisCard.find(".loading-delete-btn");
	hideLoading(deleteBtn, $(".loading-btn"));
	showLoading($(this), loading);
	var thatBtn = $(this);
	var pid = thisCard.find(".pid").val();
	//var cost = thisCard.find(".plan-cost").val();
	//var modal = thisCard.find(".edit-modal");
	//modal.modal('show');
	hideLoading($(this), loading);
        
	Swal.fire({
	    title: 'Are you sure?',
  	    text: "You won't be able to revert this!",
  	    icon: 'warning',
  	    showCancelButton: true,
  	    confirmButtonColor: '#3085d6',
  	    cancelButtonColor: '#d33',
  	    confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
  	    if (result.isConfirmed) {
		$.ajax({
	    	    type:"POST",
	    	    url:"api/delete-plan/"+pid,
	    	    headers: {
            		'Accept': 'application/json',
	    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    	    },
	    	    error: function(err){
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
			_token: token
	    	    },
	    	    success:function(data){
			Swal.fire(
      		    	    'Deleted!',
      		    	    'Your file has been deleted.',
      		    	    'success'
    			);

			thisCard.remove();
		    }
		});
	    }
	});
    });
});
