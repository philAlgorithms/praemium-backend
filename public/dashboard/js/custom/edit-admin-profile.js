$(document).ready(function(){
    var coinId = stringBefore($("#switch-coin").val(), "|");;
    var coinLogo = $("#coin-logo");
    var token = $('[name="_token"]').val();
    var addBtn = $("#add-wallet");
    var loadBtn = $("#btn-loading");
    $("#switch-coin").change(function(){
	var code = stringAfter($(this).val(), "|");
	coinId = stringBefore($("#switch-coin").val(), "|");
	coinLogo.removeClass().addClass('cf cf-' + code);
    });

    $("#add-wallet").click(function(){
	showLoading(addBtn, loadBtn);
	$.ajax({
	    type:"POST",
	    url:"api/add-admin-wallet",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    },
	    error: function(err){
		hideLoading(addBtn, loadBtn);
		var error = err.responseJSON;
	        var data = error.data;
			
		if(error.type === 'validation'){
		    var message = data[Object.keys(data)[Object.keys(data).length - 1]];
		    Swal.fire({
		    	icon: 'error',
  		    	title: 'Error',
  		    	text: message
		    });
		}else{
		    var message = typeof(error.data) == 'string' ? error.data : 'Some error occurred. Please check internet connection';
		    Swal.fire({ 
		 	icon: 'error',
			title: 'Error',
			text: message
		    });
		}
	    },
	    data: {
		crypto_currency_id : coinId,
		wallet_address : $("#wallet-address").val(),
		_token: token
	    },
	    success:function(data){
		
		hideLoading(addBtn, loadBtn);
		Swal.fire("Successful", "New wallet added to account", "Success");
	    }
    	});
    });

    $(".delete-wallet").click(function(){
	var that = $(this);
	var wid = stringAfter($(this).attr('id'), '-');
	Swal.fire({
	    title: 'Are you sure?',
  	    text: "You won't be able to revert this!",
  	    icon: 'warning',
  	    showCancelButton: true,
  	    confirmButtonColor: '#3085d6',
  	    cancelButtonColor: '#d33',
  	    confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
  	    if (result.isConfirmed) {
	$.ajax({
	    type:"POST",
	    url:"api/admin-delete-wallet/"+wid,
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    },
	    error: function(err){
		var error = err.responseJSON;
	        var data = error.data;
			
		if(error.type === 'validation'){
		    var message = data[Object.keys(data)[Object.keys(data).length - 1]];
		    Swal.fire({
		    	icon: 'error',
  		    	title: 'Error',
  		    	text: message
		    });
		}else{
		    var message = typeof(error.data) == 'string' ? error.data : 'Some error occurred. Please check internet connection';
		    Swal.fire({ 
		 	icon: 'error',
			title: 'Error',
			text: message
		    });
		}
	    },
	    data: {
		_token: token
	    },
	    success:function(data){
		Swal.fire(
      		    'Deleted!',
      		    'This address has been deleted.',
      		    'success'
    		);

		that.closest(".wallet-wrapper").remove();
	    }
    	});
	
  	    }
	});
    });
});
	/*
    var selected;
    var coinCode ='btc';
    var prices;
    var addressNotice = $('#notice-address');
    var address = addressNotice.text();
    $.ajax({
	  type:"GET",
	  url:"/prices",
	  headers: {
            'Accept': 'application/json',
	    'XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	  },
	  error: function(err){
		  return err.responseJSON;
	    //showAlert('danger','Some error occured');
	  },
	  success:function(data){
		var neat = {
		    btc: data.bitcoin.usd,
		    bnb: data.binancecoin.usd,
		    doge: data.dogecoin.usd,
		    usdt: data.tether.usd,
		    ada: data.cardano.usd,
		    eth: data.ethereum.usd
		};
		  prices = neat;
	   },
    });
    var withdrawAmount = $("#withdraw-amount").val();
    setInterval(function(){
	$.ajax({
	  type:"GET",
	  url:"/prices",
	  headers: {
            'Accept': 'application/json',
	    'XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	  },
	  error: function(err){
		  aJ(err.responseJSON);
	    //showAlert('danger','Some error occured');
	  },
	  success:function(data){
		var neat = {
		    btc: data.bitcoin.usd,
		    bnb: data.binancecoin.usd,
		    doge: data.dogecoin.usd,
		    usdt: data.tether.usd,
		    ada: data.cardano.usd,
		    eth: data.ethereum.usd
		};
		prices = new Object;
		prices = neat;
		var amount = dollarToCoin(withdrawAmount, prices[coinCode]);
		$("#notice-price").text(amount);
	   },
	});
    }, 5000);

    $("#customDropdown").click(function(){
	document.getElementById("#customDropdown").addEventListener("click");
    });


    $("#switch-coin").change(function(){
	selected = $(this).val();
	coinCode = stringBefore(selected, "|");
	var coinId = stringBefore(stringAfter(selected, "|"),'-');
	var coinPrice = stringBefore(stringAfter(selected,'-'),':');
	var coinEquivalent = dollarToCoin(withdrawAmount, coinPrice);
	address = stringAfter(selected,':');

	var liveCoin = $('#coin-stat');
	var coinLogo = $('#coin-logo');
	var coinNotice = $('#notice-coin');
	var priceNotice = $('#notice-price');
	var svgNotice = $('#notice-svg');

	var liveCoinSrc = "https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=" + coinId + "&pref_coin_id=1505";
    	liveCoin.attr('src', liveCoinSrc);
	coinLogo.removeClass().addClass('cf cf-' + coinCode);
	    
	coinNotice.text(" "+coinCode);
	priceNotice.text(coinEquivalent);
	addressNotice.text(address);
	svgNotice.attr('src',getCoinSvg(coinCode));
	$("#stat-header").text('Live ' + coinCode.toUpperCase() + ' Statistics');
    });


    $("#withdraw-amount").keyup(function(){
	withdrawAmount = $(this).val();
	var amount = dollarToCoin($(this).val(), prices[coinCode]);
	$("#notice-price").text(amount);
    });

    $("#notice-clipboard").click(function(){
	var that = $(this);
	navigator.clipboard.writeText(address).then(function(){
	    return;
	});
    });

    $("#withdraw").click(function(){
	a('coming soon');
    });
});
*/
