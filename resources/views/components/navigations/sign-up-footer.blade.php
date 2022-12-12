<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
	<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      	<a class="navbar-brand m-0" href="/" target="_blank">
            <img src="{{ URL::asset('dashboard/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">{{ appName() }}</span>
      	</a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-heigh-vh-100 h-auto h-100" id="sidenav-collapse-main">
      	<ul class="navbar-nav">
            <li class="nav-item">
          	<a class="nav-link  active" href="/my-dashboard">
		    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
		        <x-svg.shop/>
		    </div>
            	    <span class="nav-link-text ms-1">Dashboard</span>
            	</a>
            </li>
            <li class="nav-item">
        	<a data-bs-toggle="collapse" class="nav-link" href="#deposits" aria-controls="deposits" role="button" aria-expanded="false">
	    	    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
			<x-svg.office/>
	    	    </div>
            	    <span class="nav-link-text ms-1">Deposits</span>
	  	</a>
          	<div class="collapse " id="deposits">
		    <ul class="nav ms-4 ps-3 nav-sm flex-column">
                    	<li class="nav-item active">
                      	    <a class="nav-link " href="/deposit-funds">
                        	<span class="sidenav-mini-icon text-xs"> D </span>
                        	<span class="sidenav-normal"> Deposit Funds </span>
                	    </a>
                    	</li>
                    	<li class="nav-item">
                      	    <a class="nav-link " href="/view-deposits">
                        	<span class="sidenav-mini-icon text-xs"> V </span>
                        	<span class="sidenav-normal"> View Deposits </span>
                      	    </a>
                    	</li>
                    </ul>
                </div>
	    </li>
	    <li class="nav-item">
        	<a data-bs-toggle="collapse" class="nav-link" href="#withdrawals" aria-controls="withdrawals" role="button" aria-expanded="false">
	    	    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
			<x-svg.credit-card/>
	    	    </div>
            	    <span class="nav-link-text ms-1">Withdrawals</span>
	  	</a>
          	<div class="collapse " id="withdrawals">
		    <ul class="nav ms-4 ps-3 nav-sm flex-column">
                    	<li class="nav-item">
                      	    <a class="nav-link " href="/account/withdrawal/withdraw">
                        	<span class="sidenav-mini-icon text-xs"> W </span>
                        	<span class="sidenav-normal"> Withdraw Funds </span>
                	    </a>
                    	</li>
                    	<li class="nav-item">
                      	    <a class="nav-link " href="/view-deposits">
                        	<span class="sidenav-mini-icon text-xs"> V </span>
                        	<span class="sidenav-normal"> View Withdrawals </span>
                      	    </a>
                    	</li>
                    </ul>
                </div>
	    </li>
	    <li class="nav-item">
        	<a data-bs-toggle="collapse" class="nav-link" href="#packages" aria-controls="packages" role="button" aria-expanded="false">
	    	    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
			<x-svg.basket/>
	    	    </div>
            	    <span class="nav-link-text ms-1">Packages</span>
	  	</a>
          	<div class="collapse" id="packages">
		    <ul class="nav ms-4 ps-3 nav-sm flex-column">
                    	<li class="nav-item">
                      	    <a class="nav-link" href="/packages">
                        	<span class="sidenav-mini-icon text-xs"> V </span>
                        	<span class="sidenav-normal"> View Packages </span>
                	    </a>
                    	</li>
                    	<li class="nav-item">
                      	    <a class="nav-link " href="/my-packages">
                        	<span class="sidenav-mini-icon text-xs"> M </span>
                        	<span class="sidenav-normal"> My Packages </span>
                      	    </a>
                    	</li>
                    </ul>
                </div>
            </li>
            <li class="nav-item mt-3">
          	<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
	    <li class="nav-item">
          	<a class="nav-link " href="/profile">
		    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
			<x-svg.customer-support/>
		    </div>
            	    <span class="nav-link-text ms-1">Profile</span>
          	</a>
            </li>
            <li class="nav-item">
          	<a class="nav-link fixed-plugin-button" href="#">
            	    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
             		<x-svg.settings/> 
            	    </div>
            	    <span class="nav-link-text ms-1">Settings</span>
          	</a>
            </li>
            <li class="nav-item">
          	<a class="nav-link" href="/sign-out">
            	    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              		<x-svg.spaceship />	
            	    </div>
            	    <span class="nav-link-text ms-1">Log out</span>
          	</a>
            </li>
      	</ul>
    </div>
    <div class="sidenav-footer mx-3 d-none">
      	<div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
            <div class="full-background" style="background-image: url('{{ URL::asset('dashboard/img/curved-images/white-curved.jpeg') }}')"></div>
        	<div class="card-body text-start p-3 w-100">
          	    <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
            		<i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
          	    </div>
          	    <div class="docs-info">
            		<h6 class="text-white up mb-0">Need help?</h6>
            		<p class="text-xs font-weight-bold">Please check our docs</p>
            		<a href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
            	    </div>
		</div>
      	    </div>
      	<a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div>
</aside> 
