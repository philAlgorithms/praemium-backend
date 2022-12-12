<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.dashboard-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
	<x-navigations.topbar-pro colorState="dark">
	    <x-general.dashboard-breadcrumb
		pageName="Dashboard"
		pageTitle="Dashboard"
		color="dark"
	    />
	</x-navigations.topbar-pro>
	<div class="container-fluid py-4">
	    <x-general.ref-link />
	    <div class="row">
		<div class="col-12 col-md-6">
		    <div class="row">
			<x-cards.stat
		    	    text='Total deposit'
		    	    :amount="dollar($client->total_deposit)"
		    	    increment=""
		    	    icon='ni ni-money-coins'
		    	    class='col-12 mb-3'
			/>
			<x-cards.stat
		    	    text='Total withdrawals'
		    	    :amount="dollar(0)"
		    	    increment=""
		    	    icon='fas fa-credit-card'
		    	    class='col-12 mb-3'
			/>
		    </div>
		</div>
		<x-cards.coin-stat
		    class="col-12 col-md-6"
		    :coinId="firstWallet($wallets,'btc')->coin->coinlib_id"
		>
<?php /*		    <x-general.tooltip-dropdown 
			class="text-end"
			icon="fas fa-exchange-alt"
			title="Switch cryptocurrency"
			iconColor="dark"
			class2="switch-coin"
		    >
			<li class="mb-2">
			    <x-forms.switch-coin />	
			</li>
			</x-general.tooltip-dropdown> */?>
		</x-cards.coins-stat>
	    
	    </div>
	    <div class="row">
			<x-cards.withdrawal.withdraw />
			<x-widget.trading-view.chart />
			</div>
			<x-modals.wallet.add />
			<input type="hidden"  id="param"/>
	    <x-navigations.dashboard-footer />
	</div>
    </main>
    <?php /*<x-general.settings/>*/ ?>
</x-layouts.dashboard >
