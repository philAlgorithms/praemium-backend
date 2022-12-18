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
                        <th>Earning</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Deposit Principal</th>
                        <th>Intrest Rate </th>
                        <th>Deposit Plan</th>
                        <th>Deposit Date</th>
                        <th>Deposit Link</th>
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
                                <span class="text-truncate">{{ $earning->deposit->transaction->client->name }}</span>
                            </div>
                        </td>
                        @endif
			            <td class="text-xs font-weight-bold w-50">
                      	    <div class="d-flex align-items-center">
			 
                        	<span class="text-truncate">{{ dollar($earning->amount) }}</span>
                      	    </div>
                    	</td>

                        <td class="text-xs font-weight-bold w-50">
                            <div class="d-flex align-items-center">
          
                          <span class="text-truncate">{{ readFullDate($earning->pay_date) }}</span>
                            </div>
                        </td>
          
                        <td class="text-xs text-center font-weight-bold">
                            <span class="my-2 text-x">{{ showTime($earning->pay_date) }}</span>
                        </td>
                        
			            <td class="text-xs font-weight-bold w-50">
                            <div class="d-flex align-items-center">
           
                          <span class="text-truncate">{{ dollar($earning->deposit->transaction->amount) }}</span>
                            </div>
                      </td>
                      <td class="text-xs font-weight-bold w-50">
                          <div class="d-flex align-items-center">
                        <span class="text-truncate">{{ $earning->roi }}%</span>
                          </div>
                      </td>
                        <td class="font-weight-bold">
                            <span class="my-2 text-xs">{{ $earning->deposit->plan->name }} Plan</span>
                        </td>

                    	<td class="font-weight-bold">
                      	    <span class="my-2 text-xs">{{ readFullTime($earning->deposit->transaction->created_at) }}</span>
                        </td>
                        
                        <td class="text-xs text-center font-weight-bold">
                            <a href="{{ is_admin() ? '/account/admin/deposit/manage/' : '/account/deposit/view/'}}{{ $earning->deposit->id }}" class="my-2 text-x">More details&nbsp;&nbsp;<i class="fas fa-external-link-alt d-none"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
	    </div>
    </div>
</div>
