<x-layouts.dashboard >
    <x-navigations.dashboard-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
	<x-navigations.topbar-pro :notifications="$client->notifications" colorState="dark">
	    <x-general.dashboard-breadcrumb
		pageName="Dashboard"
		pageTitle="Dashboard"
		color="dark"
	    />
	</x-navigations.topbar-pro>
	<div class="container-fluid py-4">
	    <x-general.ref-link />
	    <div class="row">	
		<x-cards.general-stat />
	    </div>
	    <div class="row mt-4">
		<x-tables.plan-payments-mini
		    class="col-12 mb-5" 
		    :payments=$earnings
		/>
		<x-cards.coins-stat
		/>
	    </div>
	    <x-navigations.dashboard-footer />
	</div>
    </main>
</x-layouts.dashboard >
