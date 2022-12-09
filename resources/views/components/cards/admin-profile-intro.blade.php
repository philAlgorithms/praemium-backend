<div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
    <div class="row gx-4">
        <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              	<img src="{{ URL::asset('img/avatars/avatar.jpg') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
        </div>
        <div class="col-auto my-auto">
            <div class="h-100">
              	<h5 class="mb-1">
		    {{ $admin->username }}
              	</h5>
              	<p class="mb-0 font-weight-bold text-sm">

              	</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              	<ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                    <li class="nav-item">
                  	<a class="nav-link mb-0 px-0 py-1 active " ata-bs-toggle="tab" href="#" role="tab" aria-selected="true">
			    <x-svg.app color='dark'/>
			    <span class="ms-1">Bio</span>
                	</a>
                    </li>
                    <li class="nav-item">
                  	<a class="nav-link mb-0 px-0 py-1 " data-bs-toggl="tab" href="#addresses" data-target="addresses" ole="tab" aria-selected="false">
			    <x-svg.credit-card color="dark" />
			    <span class="ms-1">Wallet Addresses</span>
                  	</a>
                    </li>
                    <li class="nav-item d-none">
                  	<a class="nav-link mb-0 px-0 py-1 " data-bs-toggl="tab" href="#plans" data-target="plans" rol="tab" aria-selected="false">
			    <x-svg.basket color="dark" />
			    <span class="ms-1">Active Plans</span>
                  	</a>
                    </li>
              	</ul>
            </div>
        </div>
    </div>
</div>
