<x-modals.layout :id="$plan->name.'plan'" class="col-md-12 edit-modal">
    <div class="card card-plain text-start">
        <div class="card-header pb-0 text-left">
            <h3 class="font-weight-bolder text-info text-gradient">Edit {{ $plan->name }} package</h3>
	    <p>Changes made to the package's cost will not affect existing client subscriptions. However, changing the interest rates affects existing subscriptions</p>
	</div>
	<div class="card-body">
	    <form role="form text-left">
	    @csrf
		<input type="hidden" class="pid" value="{{ $plan->id }}" >
		<div class="form-group">
		    <label>Plan name</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon1"><i class="fa fa-text"></i></span>
			<input type="text" class="form-control edit-plan-name" value="{{ $plan->name }}" placeholder="Plan name" aria-label="Plan name" aria-describedby="addon1">
		    </div>
		</div>

		<div class="form-group">
		    <label>Plan cost</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon2">$</span>
			<input type="number" class="form-control edit-plan-cost" value="{{ $plan->cost }}" placeholder="Plan cost" aria-label="Plan cost" aria-describedby="addon2">
		    </div>
		</div>

		<div class="form-group">
		    <label>Maximum cost</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon5">$</span>
			<input type="number" class="form-control edit-plan-max-cost" value="{{ $plan->max_cost }}" placeholder="Maximum cost" aria-label="Plan cost" aria-describedby="addon5">
		    </div>
		</div>

		<div class="form-group">
		    <label>Interest rate</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon3"><i class="fas fa-chart-line"></i></span>
			<input type="number" class="form-control edit-plan-roi" value="{{ checkFloat($plan->roi) }}" placeholder="Interest rate" aria-label="Inrerest roi" aria-describedby="addon3">
			<span class="input-group-text" id="basic-addon1">%</span>
		    </div>
		</div>

		<div class="form-group">
		    <label>Profit return every:</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon4"><i class="fas fa-clock"></i></span>
			<input type="number" class="form-control edit-plan-cycle" value="{{ $plan->cycle }}" placeholder="Cycle" aria-label="Cycle" aria-describedby="addon4">
			<select class="form-control edit-cycle-period" aria-describedby="addon7">
			@foreach (\App\Models\Period::all() as $period)
			    @php $selected = $period->id === $plan->period_id ? 'selected' : '' @endphp
			    <option value="{{ $period->id }}" {{ $selected }}>{{ check_regular_plural($period->name, $plan->duration) }} </option>
			@endforeach
    			</select>
		    </div>
		</div>


		<div class="form-group">
		    <label>Duration</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon4"><i class="fas fa-clock"></i></span>
			<input type="number" class="form-control edit-plan-duration" value="{{ $plan->duration }}" placeholder="Duration" aria-label="Duration" aria-describedby="addon4">
			<select class="form-control edit-duration-period" aria-describedby="addon4">
			@foreach (\App\Models\Period::all() as $period)
			    @php $selected = $period->id === $plan->period_id ? 'selected' : '' @endphp
			    <option value="{{ $period->id }}" {{ $selected }}>{{ check_regular_plural($period->name, $plan->duration) }} </option>
			@endforeach
    			</select>
		    </div>
		</div>

		<div class="form-group">
		    <label for="address">Enter password to proceed</label>
		    <div class="input-group mb-4">
          		<input type="password" class="form-control edit-plan-password" placeholder="Enter password">
        	    </div>
      		</div>
		<div class="text-center">
		    <div class="button-row d-flex mt-4">
			<button class="btn bg-gradient-light mb-0 cancel-btn" type="button" title="Cancel">Cancel</button>
			<button class="btn bg-gradient-dark ms-auto mb-0 edit-btn" type="button" title="Next">Proceed</button>
			<button class="btn bg-gradient-dark ms-auto mb-0 d-none loading-edit-btn" type="button" disabled>
		            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		            <span id="load-text">Processing</span>
		        </button>
		    </div>
		</div>
	    </form>
    	</div>
    </div>
</x-modals.layout>

