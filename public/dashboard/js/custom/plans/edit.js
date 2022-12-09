$(document).ready(function(){
    var submit = $(".edit-btn");
    //var loading = submit.closest(".loading-btn");
    var cancelBtn = $('.cancel-btn');

    var token = $('[name="_token"]').val();

    submit.click(function(){
	var modal = $(this).closest(".edit-modal");
	var loading = modal.find(".loading-edit-btn");
	var thatBtn = $(this);
	var pid = modal.find(".pid").val();

	var password = modal.find(".edit-plan-password");
	var cyclePeriodId = modal.find(".edit-cycle-period");
	var durationPeriodId = modal.find(".edit-duration-period");
	var planName = modal.find(".edit-plan-name");
	var planRoi = modal.find(".edit-plan-roi");
	var planCost = modal.find(".edit-plan-cost");
	var planMaxCost = modal.find(".edit-plan-max-cost");
	var planCycle = modal.find(".edit-plan-cycle");
	var planDuration = modal.find(".edit-plan-duration");

	hideLoading(submit, $(".loading-edit-btn"));
        showLoading($(this), loading);
	disableInput(modal.find(".cancel-btn"));

	$.ajax({
	    type:"POST",
	    url:"api/edit-plan/"+pid,
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    data: {
		password: password.val(),
		name: planName.val(),
		cost: planCost.val(),
		max_cost: planMaxCost.val(),
		roi: planRoi.val(),
		cycle: planCycle.val(),
                cycle_period_id: cyclePeriodId.val(),
		duration: planDuration.val(),
		duration_period_id: durationPeriodId.val(),
		_token: token
	   },
	    error: function(err){
		hideLoading(thatBtn, loading);
		enableInput(modal.find(".cancel-btn"));
		 Swal.fire({ 
		 	icon: 'error',
			title: 'Error',
			text: 'Some error occurred. Please check internet connection'
		    });
		    var error = err.responseJSON;
		    var data = error.data;
		if(error.type === 'validation'){
		    var message = data[Object.keys(data)[Object.keys(data).length - 1]];
		    Swal.fire({
		    	icon: 'error',
  		    	title: 'Error',
  		    	text: message
		    });
		}else if(error.data){
		    var message = typeof(error.data) == 'string' ? error.data : 'Some error occurred. Please check internet connection';
		    Swal.fire({ 
		 	icon: 'error',
			title: 'Error',
			text: message
		    });
		}
	    },
	    success:function(data){	    
		hideLoading(thatBtn, loading);
		enableInput(modal.find(".cancel-btn"));
		Swal.fire(
      		    'Successful',
      		    data.data,
      		    'success'
		);
		modal.modal('hide');
		location.reload();
	    }
    	});
    });

   cancelBtn.click(function(){
	$(this).closest(".edit-modal").modal('hide');
   });
});
