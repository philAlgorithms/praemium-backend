function switchCoin(){

	var selected = $(this).val();
	var coinCode = stringBefore(selected, "|");
	var coinId = stringAfter(selected, "|");

	var liveCoin = $('#coin-stat');
	var coinLogo = $('#coin-logo');

	var liveCoinSrc = "https://widget.coinlib.io/widget?type=single_v2&theme=light&coin_id=" + coinId + "&pref_coin_id=1505";
    	liveCoin.attr('src', liveCoinSrc);
	coinLogo.removeClass().addClass('cf cf-' + coinCode);
    
}
