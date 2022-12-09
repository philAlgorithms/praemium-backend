<!-- Navbar -->
<nav class="{{ $class }}" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
	{{ $slot }}
	<div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
	    <a href="javascript:;" class="nav-link text-body p-0">
            	<div class="sidenav-toggler-inner">
              	    <i class="sidenav-toggler-line"></i>
              	    <i class="sidenav-toggler-line"></i>
              	    <i class="sidenav-toggler-line"></i>
            	</div>
            </a>
	</div>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
	    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            	<div class="input-group">
              	    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              	    <input type="text" class="form-control" placeholder="Type here...">
            	</div>
            </div>
            <ul class="navbar-nav  justify-content-end">
            	<li class="nav-item d-flex align-items-center">
              	    <a href="/profile" target="_blank">
                	<i class="fa fa-user me-sm-1 text-{{ $colorState }}"></i>
                	<span class="d-sm-inline d-none">Profile</span>
              	    </a>
            	</li>
            	<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              	    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                	<div class="sidenav-toggler-inner">
                  	    <i class="sidenav-toggler-line text-{{ $colorState }}"></i>
                  	    <i class="sidenav-toggler-line text-{{ $colorState }}"></i>
                  	    <i class="sidenav-toggler-line text-{{ $colorState }}"></i>
                	</div>
              	    </a>
            	</li>
            	<li class="nav-item px-3 d-flex align-items-center">
              	    <a href="/profile#settings" class="nav-link text-body p-0">
                	<i class="fa fa-cog fixed-plugin-button-nav cursor-pointer text-{{ $colorState }}"></i>
              	    </a>
            	</li>
            	<li class="nav-item dropdown pe-2 d-flex align-items-center">
              	    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                	<i class="fa fa-bell cursor-pointer text-{{ $colorState }}"></i>
		    </a>
		    <x-general.notification-mini />
              	</li>
    	    </ul>
	</div>
    </div>
</nav>
<!-- End Navbar -->    
