$(document).ready(function(){
    var submit = $("#create-btn");
    var loading = $("#loading-create-btn");
    var cancelBtn = $('#cancel-btn');

    var token = $('[name="_token"]').val();

    submit.click(function(){
	var thatBtn = $(this);
	var password = $("#create-plan-password");
	var durationPeriodId = $("#create-duration-period");
	var cyclePeriodId = $("#create-cycle-period");
	var planName = $("#create-plan-name");
	var planRoi = $("#create-plan-roi");
	var planCost = $("#create-plan-cost");
	var planMaxCost = $("#create-plan-max-cost");
	var planCycle = $("#create-plan-cycle");
	var planDuration = $("#create-plan-duration");

        showLoading($(this), loading);
	//disableInput($(".cancel-btn"));

	$.ajax({
	    type:"POST",
	    url:"api/create-plan",
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
	    error: function(err){ aJ(err);
		hideLoading(thatBtn, loading);
		enableInput($(".cancel-btn"));
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
		//enableInput($(".cancel-btn"));
		Swal.fire(
      		    'Successful',
      		    data.message,
      		    'success'
		);
		location.reload();
	    }
    	});
    });

   cancelBtn.click(function(){
	//$(this).closest("#create-card").modal('hide');
   });
});
