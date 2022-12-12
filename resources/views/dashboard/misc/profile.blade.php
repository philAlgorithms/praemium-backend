<x-layouts.dashboard :scripts=$scripts >
    <input type="hidden" id="cid" value="{{ auth()->user()->id }}">
    <x-navigations.dashboard-sidebar />
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
	<x-navigations.topbar-pro 
	    class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2"
	    colorState="white"
	/>
	<div class="container-fluid">
	    <x-general.cover-image />
	    <x-cards.profile-intro :client=$client />
	    <div class="row mt-4">
		<x-cards.profile-info
		    :client=$client
		/>
		<x-cards.payment-method
		    :wallets=$wallets
		    :coins="acceptedCoins()" 
		    class="col-12 col-md-6 h-100 mt-4"
		/>
	    </div>
	    <div id="settings" class="row mt-5">
		{{-- <x-cards.auth-settings /> --}}
		<x-cards.password-settings />
	    </div>
	    <x-navigations.dashboard-footer />
	</div>
    </div>
    <?php /*<x-general.settings/>*/ ?>
</x-layouts.dashboard >
