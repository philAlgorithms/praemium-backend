<div class="col-12">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-flush" id="datatable-search">
        	    <thead class="thead-light">
                    <tr>
                        <th>S/N</th>
                        @if (is_admin())
                        <th>Client</th>    
                        @endif
                        <th>Amount</th>
                        <th>Plan</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($earnings as $i=>$earning)              
                    <tr>
                    	<td>
                      	    <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="customCheck1">
                                </div>
                            	<p class="text-xs font-weight-bold ms-2 mb-0">{{ $i+1 }}</p>
                	        </div>
                        </td>
                        @if (is_admin())
                        <td class="text-xs font-weight-bold w-50">
                            <div class="d-flex align-items-center">
                                <span class="text-truncate">{{ $earning->transaction->client->name }}</span>
                            </div>
                        </td>
                        @endif
			            <td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
			 
                        	<span class="text-truncate">{{ dollar($earning->transaction->amount) }}</span>
                      	    </div>
                    	</td>

                        <td class="font-weight-bold">
                            <span class="my-2 text-xs">{{ $earning->plan->name }} Plan</span>
                        </td>

                    	<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ readFullTime($earning->transaction->created_at) }}</span>
                        </td>
                        
                        {{-- <td class="text-xs text-center font-weight-bold">
                            <a href="{{ is_admin() ? '/account/admin/deposit/manage/' : '/account/deposit/view/'}}{{ $earning->id }}" class="my-2 text-x">More details&nbsp;&nbsp;<i class="fas fa-external-link-alt d-none"></i></a>
                        </td> --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
	    </div>
    </div>
</div>
