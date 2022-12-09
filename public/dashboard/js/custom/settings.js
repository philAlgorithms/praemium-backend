$(document).ready(function(){
    var submit = $("#update");
    var loading = $("#loading");
    var token = $('[name="_token"]').val();
    var settings = $('.setting');


    submit.click(function(){
	var req = new Object;
	settings.each(function(i,obj){
	    var subReq = {
		id: $(this).attr('id'),
		value: $(this).val(),
	    };
	    req[i] = subReq;
	});

	var thatBtn = $(this);

       showLoading(thatBtn, loading);


	$.ajax({
	    type:"POST",
	    url:"/api/update-variable",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    data: req,
	    error: function(err){ 
	    	var error = err.responseJSON;  aJ(error);
		hideLoading(thatBtn, loading);
		handleCommonErrors(error);
	    },
	    success:function(data){
		hideLoading(thatBtn, loading);
		Swal.fire(
      		    'Successful',
      		    data.message,
      		    'success'
		);
		//location.reload();
	    }
    	});
    });

});
