$(document).ready(function(){

    var payBtn = $("#pay");
    var payBtnLoading = $("#loading-trust");
    var chargeDiv = $("#charge");
    var chargePercentage = chargeDiv.attr('class');
    var token = $("[name='_token']").val();
    var selected = $("#switch-coin");
    var sV = selected.val();

    var coinCode = $("#coin-code-"+sV).val();
    var coinName = $("#coin-name-"+sV).val();
    var coinPrice = $("#coin-price-"+sV).val();
    var address = $("#coin-address-"+sV).val();
    var walletId = $("#coin-wallet-id-"+sV).val();
    var trustId = $("#coin-trust-"+sV).val();
    var coinlibId = $("#coin-lib-"+sV).val();
    var coinlibName = $("#coin-lib-name-"+sV).val();
    var prices;
    var dollarAmount = $("#deposit-amount").val() *1 ;
    var dollarCharges = percentage(dollarAmount, chargePercentage);
    var totalDollarAmount = dollarAmount + dollarCharges;

    var addressNotice = $('#notice-address');
    var liveCoin = $('#coin-stat');
    var coinLogo = $('#coin-logo');
    var coinNotice = $('#notice-coin');
    var priceNotice = $('#notice-price');
    var svgNotice = $('#notice-svg');
    var qr = $("#pay-qr");
    var statHeader = $("#stat-header");
    var qLink = qrLink(coinName, address, totalAmount);
    var amount = dollarToCoin(dollarAmount, coinPrice);
    var charges = dollarToCoin(dollarCharges, coinPrice);
    var totalAmount = amount + charges;

    var trustImage = $("#trust-img").attr('src');
    var trustLink ='';
    var liveCoinSrc = "https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=" + coinlibId + "&pref_coin_id=1505";

    function clearPage(){
	dollarAmount = 0;
	$("#deposit-amount").val() = 0 ;
	dollarCharges = 0;
	totalDollarAmount = 0;
    }
    	aJ({
	    selected: sV,
	    code: coinCode,
	    name: coinName,
	    price: coinPrice,
	    address: address,
	    trustLink: trustLink,
	    amount: dollarAmount,
	    charges: dollarCharges,
	
	    qrLink: qLink,
	    coinLibName: coinlibName
	 }, true);
	

    $.ajax({
	  type:"GET",
	  url:"/prices",
	  headers: {
            'Accept': 'application/json',
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	  },
	  error: function(err){
	      aJ(err.responseJSON, true);
		  return;
	  },
	  success:function(data){
	      aJ(data,true);
		  prices = data;
		  coinPrice = data[coinlibName];
	   },
    });
    
    setInterval(function(){
	$.ajax({
	  type:"GET",
	  url:"/prices",
	  headers: {
            'Accept': 'application/json',
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	  },
	  error: function(err){
		  return;
	    //showAlert('danger','Some error occured');
	  },
	  success:function(data){
		prices = data;
		coinPrice = data[coinlibName];
		amount = dollarToCoin(dollarAmount, coinPrice);
		charges = dollarToCoin(dollarCharges, coinPrice);
		var totalAmount = amount + charges;

		$("#notice-price").text(totalAmount);
		qLink = qrLink(coinName, address, totalAmount);
		qr.attr('src',qLink);
	   },
	});
    }, 5000);
/*
    $("#customDropdown").click(function(){
	document.getElementById("#customDropdown").addEventListener("click");
    });
*/
    $("#switch-coin").change(function(){
    	sV = $(this).val();

    	coinCode = $("#coin-code-"+sV).val();
    	coinName = $("#coin-name-"+sV).val();
    	coinPrice = $("#coin-price-"+sV).val();
    	address = $("#coin-address-"+sV).val();
	walletId = $("#coin-wallet-id-"+sV).val();
    	trustId = $("#coin-trust-"+sV).val();
	coinlibId = $("#coin-lib-"+sV).val();
        coinlibName = $("#coin-lib-name-"+sV).val();

	amount = dollarToCoin(dollarAmount, coinPrice);
	
	charges = dollarToCoin(dollarCharges, chargePercentage);
	totalAmount = amount + charges;
	//totalDollarAmount = amount + charges;

	qLink = qrLink(coinName, address, totalAmount);

	liveCoinSrc = "https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=" + coinlibId + "&pref_coin_id=1505";
    	
	aJ({
	    selected: sV,
	    code: coinCode,
	    name: coinName,
	    price: coinPrice,
	    address: address,
	    trust: trustId,
	    amount: dollarAmount,
	    charges: dollarCharges,
	    qrLink: qLink,
	    coinLibName: coinlibName
	}, true);
	
	qr.attr('src',qLink);

	liveCoin.attr('src', liveCoinSrc);
	coinLogo.removeClass().addClass('cf cf-' + coinCode);
	    
	coinNotice.text(" "+coinCode);
	chargeDiv.text(dollar(dollarCharges));
	addressNotice.text(address);
	svgNotice.attr('src',getCoinSvg(coinCode));
	priceNotice.text(amount);

	statHeader.text('Live ' + coinCode.toUpperCase() + ' Statistics');
    });


    $("#deposit-amount").keyup(function(){
	dollarAmount = $(this).val() *1;

	dollarCharges = percentage(dollarAmount, chargePercentage);
	amount = dollarToCoin(dollarAmount, prices[coinlibName]);
	charges = dollarToCoin(dollarCharges, prices[coinlibName]);
	totalDollarAmount = dollarAmount + dollarCharges;
	totalAmount = amount + charges;
	
	$("#notice-price").text(totalAmount);
	chargeDiv.text(dollar(dollarCharges));
	qLink = qrLink(coinName, address, totalAmount);
	qr.attr('src', qLink);
    });

    $("#notice-clipboard").click(function(){
	var that = $(this);
	navigator.clipboard.writeText(address).then(function(){
	    notify("Copied to clipboard");
	});

    });

    payBtn.click(function(){
	var thatBtn = $(this);
	    showLoading($(this), payBtnLoading);
	    aJ({
	      amount: amount,
	      id: trustId,
	      address: address,
              token: token
            }, true);
	$.ajax({
	    type:"POST",
	    url:"api/trust-pay-a",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    error: function(err){
		hideLoading(thatBtn, payBtnLoading);
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
	      	amount: amount,
		deposit: dollarAmount,
		charges: dollarCharges,
		id: trustId,
		address: address,
		_token: token
	    },
	    success:function(data){
		hideLoading(thatBtn, payBtnLoading);
		trustLink = data;
		Swal.fire({
	    	    title: 'Transfer '+ totalAmount + ' ' + coinCode +' ?',
  	    	    text: "This record is will be saved in your pending transactions until it is verified by the moderator",
  	    	    iconHtml: '<img height="100" src="' + trustImage +'">',
  	    	    showCancelButton: true,
  	    	    confirmButtonColor: '#3085d6',
  	    	    cancelButtonColor: '#d33',
  	    	    confirmButtonText: 'Continue'
		}).then((result) => {
  	    	    if (result.isConfirmed) {
			showLoading(thatBtn, payBtnLoading);
			$.ajax({
	    		    type:"POST",
	    		    url:"api/add-deposit",
	    		    headers: {
            			'Accept': 'application/json',
	    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    },
	    		    error: function(err){aJ(err.responseJSON, true);
				hideLoading(thatBtn, payBtnLoading);
				location.reload();
			        window.location.href = trustLink;
	    		    },
	    		    data: {
	      			amount: dollarAmount,
				deposit: dollarAmount,
				charge: dollarCharges,
				receiver_wallet_id: walletId,
				_token: token
	    		    },
	    		    success:function(data){aJ(data, true);
				hideLoading(thatBtn, payBtnLoading);
				clearFields();
				Swal.fire("Request Sent","","success");
				location.reload();
				window.location.href = trustLink;
	   		    },
			});
		    }
		});
	    },
	});
    });
});
