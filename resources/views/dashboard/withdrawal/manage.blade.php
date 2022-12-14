<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.admin-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
	<x-navigations.admin-topbar colorState="dark">
	    <x-general.dashboard-breadcrumb
		pageName="Withdrawals"
		pageTitle="Manage withdrawal"
		color="dark"
	    />
	</x-navigations.admintopbar>
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
		<x-cards.withdrawal-details :withdrawal=$withdrawal >
		    <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
			<div class="button-row d-flex mt-4">
			@if ($withdrawal->transaction->status->key == env('STATUS_PENDING'))
			    <button class="btn bg-gradient-danger mb-0" id="cancel-btn" type="button" title="Cancel">Decline</button>
			    <button class="btn bg-gradient-dark ms-auto mb-0" id="confirm-btn" type="button" data-bs-toggle="modal" data-bs-target="#accept-withdrawal">Confirm</button>
			    <button class="btn bg-gradient-dark ms-auto mb-0 d-none" id="loading-confirm-btn" type="button" disabled>
					<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
					<span id="load-text">Confirm</span>
			    </button>
			@elseif ($withdrawal->transaction->status->key == env('STATUS_SUCCESSFUL'))
				<button class="btn bg-gradient-success mb-0" id="cancel-btn" type="button" title="Cancel" disabled>Confirmed</button>
			@elseif ($withdrawal->transaction->status->key == env('STATUS_SUCCESSFUL'))
				<button class="btn bg-gradient-danger mb-0" id="cancel-btn" type="button" title="Cancel" disabled>Failed</button>
			@elseif ($withdrawal->transaction->status->key == env('STATUS_PROCESSING'))
				<button class="btn bg-gradient-warning mb-0" id="cancel-btn" type="button" title="Cancel" disabled>Processing</button>
		    @endif
			    <x-modals.layout id="accept-withdrawal" class="col-md-12">
					<x-modals.accept-withdrawal :withdrawal=$withdrawal />
			    </x-modals.layout >
			</div>
		    </div>
		</x-cards.withdrawal-details>
	  
	    </div>
	    <x-navigations.dashboard-footer />
	</div>
    </main>
</x-layouts.dashboard >
