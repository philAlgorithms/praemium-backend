$(document).ready(function () {
	$(".plan-button").click(function () {
		var id = $(this).attr('data-id');
		var name = $(this).attr('data-name');
		$("#subscription-plan").val(id);
		$("#subscription-header").text('Subscribe to ' + name + ' Plan');
		console.log('hi');
	});
	$.getScript('/dashboard/js/custom/plans/check-subscribe.js',
		function (res, status) {
			//
		}
	);
});
