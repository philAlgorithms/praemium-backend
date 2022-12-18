<x-layouts.dashboard :scripts=$scripts >
    <x-navigations.admin-sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
	<x-navigations.admin-topbar colorState="dark">
	    <x-general.dashboard-breadcrumb
		pageName="Bonus"
		pageTitle="Grant Bonus"
		color="dark"
	    />
	</x-navigations.admintopbar>
	<div class="container-fluid py-4">
	    <div class="row">
		<x-cards.stat
		    text='Clients'
		    amount='{{ clients()->count() }}'
		    increment='+30%'
		    icon='fas fa-users'
		/>
	    </div>
	    <div class="row">
		<div class="col-md-8 col-sm-10 mx-auto">
		    <form class="" action="index.html">
		    @csrf
        		<div class="card my-sm-5" id="invoice">
            		<div class="card-header text-center">
				
						<div class="card-body p-3">
            			    <div class="row">
								<div class="col-md-12 mb-3 mx-auto">
									<label>Select Client</label>
									<select class="form-control" name="client" id="client">
									@foreach (clients() as $i=>$client)
										<option value="{{ $client->id }}" {{ $i === 1 ? 'selected' : '' }}>{{ $client->name }}</option>
									@endforeach	
									</select>
								</div>
								<div class="col-md-12 mb-3 mx-auto">
									<label>Select Plan</label>
									<select class="form-control" name="plan" id="plan">
									@foreach (\App\Models\Plan::all() as $i=>$plan)
										<option value="{{ $plan->id }}" {{ $i === 1 ? 'selected' : '' }}>{{ $plan->name }}</option>
									@endforeach	
									</select>
								</div>
					
								<div class="col-md-12 mb-3 mx-auto">
									<div class="form-group mb-4">
										<label for="deposit-amount">Enter Amount</label>
										<div class="input-group mb-1">
											<span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
											<input type="number" class="form-control" placeholder="Amount" id="amount" >
										</div>
									</div>
      		    			    </div>
	
								<div class="col-12 mx-auto">
									@csrf
									<button type="button" id="grant" class="col-8 col-md-6 btn btn-twitter btn-icon">
										<span class="btn-inner--icon">
											<i class="fas fa-paper-plane"></i>
										</span>
										<span class="btn-inner--text">Grant Bonus</span>
									</button>
									<button class="col-8 col-md-6 btn btn-twitter btn-icon d-none" id="grant-loading" type="button" disabled>
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
										<span >Loadining</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </form>
		</div>
	    </div>
	    <x-navigations.dashboard-footer />
	</div>
    </main>
</x-layouts.dashboard >
