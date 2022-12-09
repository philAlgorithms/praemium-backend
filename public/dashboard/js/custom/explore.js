$(document).ready(function(){
    var explore = $("#explore");

    var addressBtns = $("#address-btns");
    var addressInput = $("#address-input");
    var checkAddress = $("#check-address");
    var loadingAddress = $("#loading-address");

    var txBtns = $("#tx-btns");
    var txInput = $("#tx-input");
    var checkTx = $("#check-tx");
    var loadingTx = $("#loading-tx");

    var coin = $('#coin');
    var address = $("#address");
    var tx = $("#tx");
    var token = $('[name="_token"]').val()
    var body;

    if (document.getElementById('coin')) {
      var crypto = document.getElementById('coin');
      const example = new Choices(crypto, {
	searchPlaceholderValue: 'Search Coin',
      });
    }
    if (document.getElementById('explore')) {
      var xplore = document.getElementById('explore');
      const xplorer = new Choices(xplore, {
	searchPlaceholderValue: 'Select method',
      });
    }

    explore.change(function(){
	addressBtns.toggleClass('d-none');
	txBtns.toggleClass('d-none');

	addressInput.toggleClass('d-none');
	txInput.toggleClass('d-none'); 
    });

    coin.change(function(){
	var that = $(this);
	var cid = that.val();
	var clogo = $("#logo-"+cid).val();

	$(".cl").each(function(i,obj){
	    $(this).children(':first').removeClass().addClass('cf cf-'+clogo);
	});
    });

 
    checkAddress.click(function(){
	var thatBtn = $(this);

        showLoading($(this), loadingAddress);

	$.ajax({
	    type:"POST",
	    url:"api/explore-address",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    data: {
		coin_id: coin.val(),
		address:address.val(),
		_token: token
	    },
	    error: function(err){
	    	var error = err.responseJSON;
		hideLoading(thatBtn, loadingAddress);
		handleCommonErrors(error);
	    },
	    success:function(data){
		    aJ(data);
		hideLoading(thatBtn, loadingAddress);

		window.open(data.data, '_blank').focus();
		Swal.fire(
      		    'Successful',
      		    'Redirecting to '+ data.data.split('/').slice(0, 3).join('/'),
      		    'success'
		);
	    }
    	});

    });

    checkTx.click(function(){
	var thatBtn = $(this);

        showLoading($(this), loadingTx);

	$.ajax({
	    type:"POST",
	    url:"api/explore-tx",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    data: {
		coin_id: coin.val(),
		tx:tx.val(),
		_token: token
	    },
	    error: function(err){
	    	var error = err.responseJSON;
		hideLoading(thatBtn, loadingTx);
		handleCommonErrors(error);
	    },
	    success:function(data){
		hideLoading(thatBtn, loadingTx);

		window.open(data.data, '_blank').focus();
		Swal.fire(
      		    'Successful',
      		    'Redirecting to '+ data.data.split('/').slice(0, 3).join('/'),
      		    'success'
		);
	    }
    	});

    });

});
