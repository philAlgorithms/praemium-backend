$(document).ready(function(){
    var loading = $("#create-feature-loading");
    var title = $("#title");
    var feature = $("#feature");
    var icon = $("#icon");
    var type = $("#feature-type");
    var color = $("#color");
    var featureId = $("#feature-id");
    var featureUuid = $("#feature-uuid");
    $("#update-feature").click(function(){
	var that = $(this);
	showLoading(that, loading);
	$.ajax({
	    type:"POST",
            url:"/account/features/update",
	    data: {
		uuid: featureUuid.val(),
		color: color.val(),
		title: title.val(),
		feature: feature.val(),
		icon: icon.val(),
		feature_type_id: type.val(),
	    },
	    datatype: 'json',
	    error: function(err){
		var error = err.responseJSON;
		hideLoading(that, loading);
		handleCommonErrors(error); 
	    },
	    success:function(data){
		hideLoading(that, loading);
		Swal.fire(
		    "Succesful", 
		    data.message, 
		    "success"
		);
	    }
	});
    });
});
