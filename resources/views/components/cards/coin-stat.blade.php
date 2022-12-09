<div class="{{ $class }}">
    <div class="card">
	<div class="card-header pb-0 p-3">
	    <div class="d-flex justify-content-between">
		<h6 class="mb-2" id="stat-header">Live BTC Statistics</h6>
		{{ $slot }}
	    </div>
        </div>
	<div class="card-body p-">
	    <div style="">
		<iframe 
		    src="https://widget.coinlib.io/widget?type=single_v2&theme={{ $theme }}&coin_id={{ $coinId }}&pref_coin_id={{ $prefCoinId }}"
		    id="coin-stat" 
		    width="360" 
		    height="auto" 
		    scrolling="auto" 
		    marginwidth="0" 
		    marginheight="0" 
		    frameborder="0" 
		    border="0" 
		    style="border:0;margin:0;padding:0;line-height:14px;"
		    class="col-12">
	        </iframe>
	    </div>
	</div>
    </div>
</div>

