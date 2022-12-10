<x-layouts.dashboard :scripts=$scripts >
    <input type="hidden" id="cid" value="{{ auth()->user()->id }}">
    <x-navigations.admin-sidebar />
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
	<x-navigations.admin-topbar 
	    class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2"
	    colorState="white"
	/>
	<div class="container-fluid">
	    <x-general.cover-image />
	    <x-cards.admin-profile-intro :admin=$admin />
	    <div class="row mt-4">
		<x-cards.admin-profile-info
		    :admin=$admin
		/>
		<x-cards.payment-method
		    :wallets=$wallets
		    :coins="\App\Models\Coin::all()" 
		    class="col-12 col-md-6 h-100 mt-4"
		/>
	    </div>
	    <x-navigations.dashboard-footer />
	</div>
    </div>
    <?php /*<x-general.settings/>*/ ?>
</x-layouts.dashboard >
