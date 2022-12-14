$(document).ready(function () {
	$(".plan-button").click(function () {
		var id = $(this).attr('data-id');
		var name = $(this).attr('data-name');
		$("#withdrawal-plan").val(id);
		$("#withdrawal-header").text('Withdraw from ' + name + ' Plan');
	});
	$.getScript('/dashboard/js/custom/plans/check-withdraw.js',
		function (res, status) {
			//
		}
	);
});
