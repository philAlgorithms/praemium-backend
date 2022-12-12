$(document).ready(function(){
    $(".delete-wallet").click(function(){
	var that = $(this);
	var loading = that.closest(".button-wrapper").find(".loading-delete");
	var uuid = that.attr('data-wallet-uuid');
	var url = that.attr("data-delete-url");

	Swal.fire({
	    title: 'Delete this wallet?',
	    text: "This wallet will be permanently deleted!",
	    icon: 'warning',
	    showCancelButton: true,
	    confirmButtonColor: '#3085d6',
	    cancelButtonColor: '#d33',
	    confirmButtonText: 'Continue'
	}).then((result) => {
	    if (result.isConfirmed) {	
		showLoading(that, loading);
	    
		$.ajax({
		    type:"POST",
		    url: url,
		    error: function(err){
			var error = err.responseJSON;
			hideLoading(that, loading);
			handleCommonErrors(error);
		    },
		    data: {
			uuid: uuid
		    },
		    success:function(data){
			hideLoading(that, loading);
			Swal.fire("Wallet Removed","","success");
			location.reload();
		    },
		});
	    }
	});
    });

});
