<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.dashboard-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
	<x-navigations.topbar-pro colorState="dark">
	    <x-general.dashboard-breadcrumb
		pageName="Withdrawals"
		pageTitle="withdrawal Detail"
		color="dark"
	    />
	</x-navigations.topbar-pro>
	<div class="container-fluid py-4">
	    <div class="row">
			<x-cards.general-stat />
	    </div>
	    <div class="row">
		<x-cards.withdrawal-details :withdrawal=$withdrawal >
		    {{-- <div class="col-lg-6 col-md-6 col-12 my-auto text-end d-none">                                                                   <a href="javascript:;" class="btn bg-gradient-info mb-0">Contact Us</a>                                               <p class="text-sm mt-2 mb-0">Do you like the product? Leave us a review <a href="javascript:;">here</a>.</p>                                                                 </div> --}}
		</x-cards.withdrawal-details>
	    </div>
	    <x-navigations.dashboard-footer />
	</div>
    </main>
<?php /*<x-general.settings/>*/ ?>
</x-layouts.dashboard >
