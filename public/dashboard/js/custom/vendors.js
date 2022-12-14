$(document).ready(function () {
	$.ajaxSetup({
		headers: {
			'accept': 'application/json',
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(".copy").click(function () {
		var target = $(this).attr('data-copy-target');
		var text = $(target).attr('data-copy-text');
		navigator.clipboard.writeText(text).then(function () {
			//notify("Copied to clipboard");
		});
	});

	$(".toggle-visibility").click(function () {
		var input = $(this).closest('div').find('input');
		visible(input);
	});

	$(".icon-fluid").blur(function () {
		var iconTarget = $(this).attr('data-icon-target');
		$(iconTarget).removeClass().addClass($(this).val());
	});

	$(".show-long-modal").click(function () {
		var that = $(this);
		appendLongModal(that.attr('data-title'), that.attr('data-body'), that.attr('data-target'))
	});
	var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
	var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
	});


	var myCarousel = document.querySelector('#carousel-testimonials')
	var carousel = new bootstrap.Carousel(myCarousel, {
		interval: 2500,
		wrap: true,
		ride: 'carousel'
	});


});

if ($(".js-choice").length) {
	choiceJs(".js-choice");
}
//DatatablesJs
if ($(".paginated-table").length) {
	new simpleDatatables.DataTable(".paginated-table", {
		searchable: true,
		fixedHeight: false,
		perPageSelect: false
	});
}

if ($(".glidet").length) {
	new Glide('.glidte', {
		type: 'carousel',
		startAt: 1,
		focusAt: 2,
		perTouch: 1,
		perView: 4
	}).mount();
}

function choiceJs(selector) {
	var element = document.querySelectorAll(selector);

	element.forEach(function (item) {
		var removeItemBtn = item.getAttribute('data-remove-item-button') == 'true' ? true : false;
		var placeHolder = item.getAttribute('data-placeholder') == 'false' ? false : true;
		var placeHolderVal = item.getAttribute('data-placeholder-val') ? item.getAttribute('data-placeholder-val') : 'Type and hit enter';
		var maxItemCount = item.getAttribute('data-max-item-count') ? item.getAttribute('data-max-item-count') : 10;
		var searchEnabled = item.getAttribute('data-search-enabled') == 'false' ? false : true;

		var choices = new Choices(item, {
			removeItemButton: removeItemBtn,
			placeholder: placeHolder,
			placeholderValue: placeHolderVal,
			maxItemCount: maxItemCount,
			searchEnabled: searchEnabled
		});

	});
}

function appendLongModal(title, body, selector) {
	if (selector === undefined) selector = '#long-modal';
	var modal = $(selector);
	modal.find('.modal-title').text(title);
	modal.find('.modal-body').text(body);
}

function appendLoading(selector, clear) {
	if (clear === undefined) clear = true;
	if (clear) $(selector).empty();
	a(selector);
	$(selector).append('<div class="align-items-center justify-content-center mx-auto bg-success"><div class="spinner-border text-center bg-info" role="status"><span class="sr-only">Loading...</span></div></div>');
}

function checkLoggedIn(success, fallback) {

	$.ajax({
		type: "POST",
		url: "/account/auth/check",
		datatype: 'json',
		error: function (err) {
			var error = err.responseJSON;
			hideLoading(that, loading);
			handleCommonErrors(error);
		},
		success: function (data) {
			if (data)
				success();
			else
				fallback();
		}
	});
}