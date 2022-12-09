$(document).ready(function(){
    var withdrawBtn = $("#withdraw");
    var withdrawBtnLoading = $("#loading-withdraw");
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
    var dollarAmount = $("#withdraw-amount").val() *1 ;
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
//var withdrawAmount = $("#withdraw-amount").val();
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
	      aJ(data, true);
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




    $("#withdraw-amount").keyup(function(){
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
	    return;
	});
    });

    withdrawBtn.click(function(){
	var thatBtn = $(this);
	    showLoading($(this), withdrawBtnLoading);
	    aJ({
              token: token,
		amount: amount,
		otp: $("#otp").val(),
		charges: dollarCharges,
		address: address,
		withdraw: totalDollarAmount,
            },true);
	$.ajax({
	    type:"POST",
	    url:"api/withdraw-check",
	    headers: {
            	'Accept': 'application/json',
	    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
	    data: {
	      	amount: amount,
		otp: $("#otp").val(),
		withdraw: totalDollarAmount,
		charges: dollarCharges,
		address: address,
		coin: coinCode,
		_token: token
	    },
	    error: function(err){aJ(err, true);
		hideLoading(thatBtn, withdrawBtnLoading);
		var error = err.responseJSON;
	        handleCommonErrors(error);	
	    },
	    
	    success:function(data){
		hideLoading(thatBtn, withdrawBtnLoading);
		Swal.fire({
	    	    title: 'Confirm Withdrawal',
  	    	    text: dollar(dollarAmount)+" plus a service charge of "+dollar(dollarCharges)+" is going to be withdrawn from your earning balance. Before proceeding, please confirm the "+coinName+" address: ("+address+")",
  	    	    iconHtml: '<img height="100" src="'+data+'">',
		    customClass: {icon: "border-0"},
  	    	    showCancelButton: true,
  	    	    confirmButtonColor: '#3085d6',
  	    	    cancelButtonColor: '#d33',
  	    	    confirmButtonText: 'Confirm'
		}).then((result) => {
  	    	   if (result.isConfirmed) {
			showLoading(thatBtn, withdrawBtnLoading);
			$.ajax({
	    		    type:"POST",
	    		    url:"api/add-withdrawal",
	    		    headers: {
            			'Accept': 'application/json',
	    			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    		    },
	    		    error: function(err){
				aJ(err.responseJSON, true);
				hideLoading(thatBtn, withdrawBtnLoading);
				location.reload();
			       // window.location.href = trustLink;
			    },
	    		    data: {
	      			amount: dollarAmount,
				deposit: dollarAmount,
				charge: dollarCharges,
				payee_wallet_id: walletId,
				_token: token
	    		    },
	    		    success:function(data){
				hideLoading(thatBtn, withdrawBtnLoading);
				clearFields();
				Swal.fire("Request sent", "Your request for a withdrawal has been received. Your will received a response very soon.", "success");
				setTimeout(location.reload(),3000);
				//window.location.href = trustLink;
	   		    },
			});
		   }
		});
	    },
	});
    });
});
