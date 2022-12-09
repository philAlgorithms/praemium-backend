<div class="{{ $class }} my-3">
    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Transactions Overview</h6>
                </div>
                <div class="col-6 text-end">
                    <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
            	</div>
            </div>
    	</div>
    	<div class="card-body p-3 pb-0">
	    <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                    	<h6 class="mb-1 text-dark font-weight-bold text-sm">Total Deposited</h6>
                    	<span class="text-xs"></span>
                    </div>
		    <div class="d-flex flex-column">
			<h5 class="mb-1 text-dark font-weight-bold text-sm">
			    {{ dollar($client->finance->total_deposits) }}
			</h5>
			<span class="text-xs d-none">{{ cap($client->finance->total_deposits) }}</span>

		    </div>
		</li>
		<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                    	<h6 class="mb-1 text-dark font-weight-bold text-sm">Total Withdrawn</h6>
                    	<span class="text-xs"></span>
                    </div>
		    <div class="d-flex flex-column">
			<h5 class="mb-1 text-dark font-weight-bold text-sm">
			    {{ dollar($client->finance->total_withdrawals) }}
			</h5>
			<span class="text-xs d-none">{{ cap($client->finance->total_deposits) }}</span>

		    </div>
		</li>
		<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                    	<h6 class="mb-1 text-dark font-weight-bold text-sm">Deposit balance</h6>
                    	<span class="text-xs"></span>
                    </div>
		    <div class="d-flex flex-column">
			<h5 class="mb-1 text-dark font-weight-bold text-sm">
			    {{ dollar($client->finance->current_funding_balance) }}
			</h5>
			<span class="text-xs d-none">{{ cap($client->finance->total_deposits) }}</span>

		    </div>
		</li>
		<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                    	<h6 class="mb-1 text-dark font-weight-bold text-sm">Balance from earning</h6>
                    	<span class="text-xs"></span>
                    </div>
		    <div class="d-flex flex-column">
			<h5 class="mb-1 text-dark font-weight-bold text-sm">
			    {{ dollar($client->finance->current_earning_balance) }}
			</h5>
			<span class="text-xs d-none">{{ cap($client->finance->total_deposits) }}</span>

		    </div>
		</li>
		<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                    	<h6 class="mb-1 text-dark font-weight-bold text-sm">Total Earned</h6>
                    	<span class="text-xs"></span>
                    </div>
		    <div class="d-flex flex-column">
			<h5 class="mb-1 text-dark font-weight-bold text-sm">
			    {{ dollar($client->finance->total_earned) }}
			</h5>
			<span class="text-xs d-none">{{ cap($client->finance->total_deposits) }}</span>

		    </div>
		</li>
		<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                    	<h6 class="mb-1 text-dark font-weight-bold text-sm">Total Subscribed</h6>
                    	<span class="text-xs"></span>
                    </div>
		    <div class="d-flex flex-column">
			<h5 class="mb-1 text-dark font-weight-bold text-sm">
			    {{ dollar($client->finance->total_plan_subscriptions) }}
			</h5>
			<span class="text-xs d-none">{{ cap($client->finance->total_deposits) }}</span>

		    </div>
		</li>

            </ul>
        </div>
    </div>
</div>
