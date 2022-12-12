$(document).ready(function(){
    var uuidEl = $("#feature-uuid");
    var update = $("#update-feature");
    var create = $("#create-feature");

    $(".edit-feature").click(function(){
	var that = $(this);
	var uuid = that.attr('data-feature-uuid');
	uuidEl.val(uuid);
    	showItem(update, create);
	$("#title").val(that.attr('data-title'));
	$("#feature").val(that.attr('data-feature'));
	$("#type").val(that.attr('data-type'));
	$("#icon").val(that.attr('data-icon'));
	$("#icon").blur();
    });

    $(".add-feature").click(function(){
	$("#title").val('');
	$("#feature").val('');
	$("#icon").val('fas fa-heading');
	$("#icon").blur();

    });
});
