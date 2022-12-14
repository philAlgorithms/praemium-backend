<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.admin-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
		<x-navigations.admin-topbar colorState="dark">
			<x-general.dashboard-breadcrumb
			pageName="Withdrawals"
			pageTitle="Withdraw History"
			color="dark"
			/>
		</x-navigations.admin-topbar>
		<div class="container-fluid py-4">
			<div class="row">
				<x-cards.general-stat />
			</div>
			<div class="row">
			<x-tables.admin-withdrawals 
				:withdrawals=$withdrawals
			/>
			</div>
			<x-navigations.dashboard-footer />
		</div>
    </main>
</x-layouts.dashboard >
