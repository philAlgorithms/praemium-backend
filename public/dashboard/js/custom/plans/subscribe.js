$(document).ready(function(){
    var submit = $(".subscribe-btn");
    //var loading = submit.closest(".loading-btn");
    var cancelBtn = $('.cancel-btn');

    var token = $('[name="_token"]').val();

    submit.click(function(){
	var loading = $(this).closest(".subscribe-modal").find(".loading-subscribe-btn");
	hideLoading(submit, $(".loading-subscribe-btn"));
	showLoading($(this), loading);
	var thatBtn = $(this);
	var pid = $(this).closest(".subscribe-modal").find(".pid").val();
	var password = $(this).closest(".subscribe-modal").find(".password").val();
	var amount = $(this).closest(".subscribe-modal").
find(".amount").val();
	$.ajax({
	    type:"POST",
	    url:"api/subscribe-plan",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    },
	    data: {
		password: password,
		amount: amount,
		plan_id: pid,
		_token: token
	    },
	    error: function(err){
		hideLoading(thatBtn, loading);
		    var error = err.responseJSON;
		    var data = error.data;
		    handleCommonErrors(error);
	    },
	    success:function(data){	
		hideLoading(thatBtn, loading);
		Swal.fire(
      		    'Successful',
      		    data.data,
      		    'success'
		);
		thatBtn.closest(".subscribe-modal").modal('hide');	
	    }
    	});
    });

   cancelBtn.click(function(){
	$(this).closest(".subscribe-modal").modal('hide');
   });
});
