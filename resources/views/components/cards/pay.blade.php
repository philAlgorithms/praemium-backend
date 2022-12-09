<div class="{{ $class }}">
    <div class="card">
	<div class="card-header pb-0 p-3">
	    <div class="d-flex justify-content-between">
                <h6 class="mb-2">Scan QR Code With your Favorite wallet</h6>
            </div>
        </div>
	<div class="card-body p-3">
	    <div class="row">
		<div class="col-12">
	    	    <img class="col-12" id="pay-qr" src="https://chart.googleapis.com/chart?chs=360x360&chld=L|2&cht=qr&chl=bitcoin:bc1qkz36qxz4smwk57m3ryuwm84mpw0hdls32ya4ee?amount=.01" >
		</div>
	    </div>
	</div>
	<div class="card-footer pb-0 p-3 mb-2">
	    <p class="ps-2">Click the button below if you have already transferred</p>
	    <div class="d-flex justify-content-center text-center">
	   	<button class="btn bg-gradient-dark ms-auto mb-0 mx-auto" id="confirm-btn" type="button" data-bs-toggle="modal" data-bs-target="#upload-deposit">Upload</button>                                                                                                    <button class="btn bg-gradient-dark ms-auto mb-0 mx-auto d-none" id="loading-confirm-btn" type="button" disabled>
		    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
		    <span id="load-text">Upload</span>
		</button>
		<div class="modal fade " id="upload-deposit" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true" data-bs-backdrop=false>
    		    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
			<div class="modal-content">
	    		    <div class="modal-body p-0">
				<x-modals.upload-deposit />
			    </div>
			</div>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>

