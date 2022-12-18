<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.admin-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
	<x-navigations.admin-topbar colorState="dark">
	    <x-general.dashboard-breadcrumb
		pageName="Bonus"
		pageTitle="Earnings"
		color="dark"
	    />
	</x-navigations.admin-topbar>
	<div class="container-fluid py-4">
	    <div class="row">
			<x-cards.stat
				text='Clients'
				:amount="\App\Models\Client::all()->count()"
				increment='+30%'
				icon='ni ni-money-users'
			/>
		</div>
		<div class="row">
			<x-tables.bonus.earnings :earnings=$earnings />
		</div>
		<x-navigations.dashboard-footer />
		</div>
    </main>
</x-layouts.dashboard >
