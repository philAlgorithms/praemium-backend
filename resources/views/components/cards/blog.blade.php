<div class="col-lg-4 mb-lg-0 mb-4">
    <div class="card">
	<div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
	    <a href="javascript:;" class="d-block blur-shadow-image">
		<img src="{{ URL::asset('proofs/'.$blog->banner) }}" class="img-fluid border-radius-md" alt="anastasia" style=""><noscript><img src="{{ URL::asset('proofs/'.$blog->banner) }}" class="img-fluid border-radius-md" alt="blog thumbnail"></noscript>
	    </a>
	</div>
	<div class="card-body">
	    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold"></span>
	    <a href="/blogs/post/{{ $blog->uuid }}" class="card-title mt-3 h5 d-block text-darker">
		{{ $blog->title }}
	    </a>
	    <p class="card-description mb-4 d-none">
	    </p>
	    <div class="author align-items-center">
		<img data-cfsrc="../../assets/img/team-2.jpg" alt="..." class="avatar shadow" style="display:none;visibility:hidden;"><noscript><img src="../../assets/img/team-2.jpg" alt="..." class="avatar shadow d-none"></noscript>
		<div class="name ps-2">
		    <span></span>
		    <div class="stats">
			<small>Posted on {{ readFullDate($blog->created_at) }}</small>
		    </div>
		</div>
	    </div>
	</div>
    </div>
</div>
