<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.dashboard-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
	<x-navigations.topbar-pro colorState="dark">
	    <x-general.dashboard-breadcrumb
			pageName="Deposits"
			pageTitle="Fund account"
			color="dark"
	    />
	</x-navigations.topbar-pro>
	<div class="container-fluid py-4">
	    <div class="row">
			<x-cards.general-stat />
	    </div>
	    <div class="row">
			<x-cards.wallet.pay :wallet=$wallet :walletPay=$payLink :amount="dollar($amount)" :message="'Send '.token($price, $wallet->coin).' to'" />
			<x-cards.wallet.hash :amount=$amount :address="$wallet->address" :coin="$wallet->coin" :plan="$plan"/>
			<x-widget.trading-view.chart />
	    </div>

	    <input type="hidden"  id="param" data-amount="{{ $amount }}" data-coin-price=""/>
	    <x-navigations.dashboard-footer />
	</div>
    </main>
</x-layouts.dashboard >
