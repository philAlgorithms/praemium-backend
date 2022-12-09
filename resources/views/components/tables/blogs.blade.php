<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
                   	<th>S/N</th>
			<th>Title</th>
			<th>Date</th>
                    	<th>Action</th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($blogs as $i=>$blog)              
		    <tr>
                    	<td>
                      	    <div class="d-flex align-items-center">
                        	<div class="form-check">
                          	    <input class="form-check-input" type="checkbox" id="customCheck1">
                  	    	</div>
                            	<p class="text-xs font-weight-bold ms-2 mb-0">{{ $i+1 }}</p>
                	    </div>
			</td>

			<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ $blog->title }}</span>
			</td>

                    	<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ readFullDate($blog->created_at) }}</span>
			</td>
		
                    	<td class="text-xs font-weight-bold">
                      	    <div class="d-flex align-items-center">
                            	<button class="btn btn-icon btn-rounded btn-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center delete" data-uuid="{{ $blog->uuid }}"><i class="fas fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
                        	
				<button class="btn btn-icon btn-rounded btn-danger mb-0 me-2 btn-sm d-flex align-items-center justify-content-center d-none loading-delete" type="button" disabled>
			    	    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			    	    <span >Deleting</span>
	    			</button>
                            </div>
			</td>
    		    </tr>
		@endforeach
		</tbody>
            </table>
	</div>
    </div>
</div>
