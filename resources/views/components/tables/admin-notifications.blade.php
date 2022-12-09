<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	<thead class="thead-light">
                    <tr>
			<th>S/N</th>
			<th>Message</th>
			<th>Date</th>
			<th></th>
                    </tr>
                </thead>
		<tbody>
		@foreach ($notifications as $i=>$notification)              
		    <tr>
                    	<td>
                      	    <div class="d-flex align-items-center">
                        	<div class="form-check">
                          	    <input class="form-check-input" type="checkbox" id="customCheck1">
                  	    	</div>
                            	<p class="text-xs font-weight-bold ms-2 mb-0">{{ $i+1 }}</p>
                	    </div>
			</td>
			<td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
				<i class="{{ $notification->data['icon'] }}"></i> 
                        	<span class="text-truncate">{{ $notification->data['admin_text'] }}</span>
                      	    </div>
                    	</td>


                    	<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ time_elapsed_string($notification->created_at) }}</span>
			</td>

			<td class="text-xs text-center font-weight-bold">
                      	    <a href="{{ $notification->data['admin_url'] }}" class="my-2 text-x">More details&nbsp;&nbsp;</i></a>
			</td>
		    </tr>
		@endforeach
		</tbody>
            </table>
	</div>
    </div>
</div>
