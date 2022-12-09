<div class="card text-start">
        <div class="card-header pb-0 text-left">
            <h3 class="font-weight-bolder text-info text-gradient">Create package</h3>
	    <p>Please fill in all the fields and enter your password to complete process</p>
	</div>
	<div class="card-body">
	    <form role="form text-left">
	    @csrf
		<input type="hidden" class="pid" value="" >
		<div class="form-group">
		    <label>Plan name</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon1"><i class="fa fa-text"></i></span>
			<input type="text" class="form-control " id="create-plan-name"  placeholder="Plan name" aria-label="Plan name" aria-describedby="addon1">
		    </div>
		</div>

		<div class="form-group">
		    <label>Plan cost</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon2">$</span>
			<input type="number" class="form-control " id="create-plan-cost"  placeholder="Plan cost" aria-label="Plan cost" aria-describedby="addon2">
		    </div>
		</div>

		<div class="form-group">
		    <label>Maximum cost</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon5">$</span>
			<input type="number" class="form-control" id="create-plan-max-cost"  placeholder="Maximum cost" aria-label="Plan cost" aria-describedby="addon5">
		    </div>
		</div>


		<div class="form-group">
		    <label>Interest rate</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon3"><i class="fas fa-chart-line"></i></span>
			<input type="number" class="form-control " id="create-plan-roi" placeholder="Interest rate" aria-label="Inrerest roi" aria-describedby="addon3">
			<span class="input-group-text" id="basic-addon1">%</span>
		    </div>
		</div>
		
		<div class="form-group">
		    <label>Profit returns every:</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon4"><i class="fas fa-clock"></i></span>
			<input type="number" class="form-control " id="create-plan-cycle" placeholder="Duration" aria-label="Duration" aria-describedby="addon4">
			<select class="form-control " id="create-cycle-period" aria-describedby="addon4">
			    <option >Choose Period</option>
			@foreach (\App\Models\Period::all() as $period)
			    <option value="{{ $period->id }}" >{{ $period->name }} </option>
			@endforeach
    			</select>
		    </div>
		</div>


		<div class="form-group">
		    <label>Duration</label>
		    <div class="input-group">
			<span class="input-group-text" id="addon4"><i class="fas fa-clock"></i></span>
			<input type="number" class="form-control " id="create-plan-duration" placeholder="Duration" aria-label="Duration" aria-describedby="addon4">
			<select class="form-control " id="create-duration-period" aria-describedby="addon4">
			    <option >Choose Period</option>
			@foreach (\App\Models\Period::all() as $period)
			    <option value="{{ $period->id }}" >{{ $period->name }} </option>
			@endforeach
    			</select>
		    </div>
		</div>

		<div class="form-group">
		    <label for="address">Enter password to proceed</label>
		    <div class="input-group mb-4">
          		<input type="password" class="form-control " id="create-plan-password" placeholder="Enter password">
        	    </div>
      		</div>
		<div class="text-center">
		    <div class="button-row d-flex mt-4">
			<button class="btn bg-gradient-light mb-0 cancel-btn" type="button" title="Cancel">Cancel</button>
			<button class="btn bg-gradient-dark ms-auto mb-0 " id="create-btn" type="button" title="Next">Proceed</button>
			<button class="btn bg-gradient-dark ms-auto mb-0 d-none" id="loading-create-btn" type="button" disabled>
		            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		            <span id="load-text">Processing</span>
		        </button>
		    </div>
		</div>
	    </form>
    	</div>
    </div>

