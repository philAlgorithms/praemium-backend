<div class="card mt-4">
    <div class="card-header pb-0 p-3">
	<div class="row">
	    <div class="col-6 d-flex align-items-center">
		<h6 class="mb-0">Payment Method</h6>
	    </div>
	    @if($isOwner === true)
	    <div class="col-6 text-end">
		<a class="btn bg-gradient-dark mb-0" href="javascript:;" data-bs-toggle="modal" data-bs-target="#add-wallet-modal"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a>
	    </div>
	    @endif
	</div>
    </div>
    <div class="card-body p-3">
	<div class="row">
	    @foreach ($wallets as $wallet)
	    <div class="col-md-6 mb-md-0 mb-4">
		<x-card.wallet.brief :address="$wallet->address" :coin="$wallet->coin">
		    <button type="button" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-auto delete-wallet" data-wallet-uuid="{{ $wallet->id }}" data-delete-url="{{ is_admin() ? '/account/wallets/admin/delete' : '/account/wallets/user/delete' }}">
			<i class="fas fa-trash" aria-hidden="true"></i>
		    </button>
		</x-card.wallet.brief>
	    </div>
	    @endforeach
	</div>
    </div>
</div>
