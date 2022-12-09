<div class="col-lg-6 col-12 mb-3">
    <div class="card card-profile overflow-hidden">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
              	<a href="javascript:;">
                    <div class="p-3 pe-md-0">
                  	<img class="w-100 border-radius-md" src="{{ landing($image) }}" alt="our team">
                    </div>
              	</a>
            </div>
            <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
              	<div class="card-body">
                    <h5 class="mb-0">{{ $name }}</h5>
                    <h6 class="text-info">{{ $role }}</h6>
                    <p class="mb-0">{{ $description }}</p>
              	</div>
            </div>
        </div>
    </div>
</div>
