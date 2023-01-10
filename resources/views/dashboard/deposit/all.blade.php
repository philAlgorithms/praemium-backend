<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.admin-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
	<x-navigations.admin-topbar colorState="dark">
	    <x-general.dashboard-breadcrumb
		pageName="Deposits"
		pageTitle="Deposit History"
		color="dark"
	    />
	</x-navigations.admin-topbar>
	<div class="container-fluid py-4">
	    <div class="row">
		<x-cards.stat
		    text='Clients'
		    amount='{{ \App\Models\Client::all()->count() }}'
		    increment='+30%'
		    icon='fas fa-users'
		/>
	    </div>
	    <div class="row">
		<x-tables.admin-deposits :deposits=$deposits />
	    </div>
	    <x-navigations.dashboard-footer />
	</div>
    </main>
<?php /*<x-general.settings/>*/ ?>
</x-layouts.dashboard >
