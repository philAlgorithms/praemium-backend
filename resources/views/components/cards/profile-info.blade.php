<div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4 {{ $class }}">
    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
        	<div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Profile Information</h6>
        	</div>
                <div class="col-md-4 text-end">
                    <a href="javascript:;">
                    	<i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <p class="text-sm">
		{{ $client->description }}
            </p>
            <hr class="horizontal gray-light my-4">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ $client->name }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{ $client->phone_number }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a1c0cdc4c2d5c9ceccd1d2cecfe1ccc0c8cd8fc2cecc">{{ $client->email }}</a></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; {{ $client->id }}</li>
                <li class="list-group-item border-0 ps-0 pb-0">
                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    	<i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    	<i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                    	<i class="fab fa-instagram fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
