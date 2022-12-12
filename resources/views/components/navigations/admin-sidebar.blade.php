<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
	<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      	<a class="navbar-brand m-0" href="/" target="_blank">
            <img src="{{ URL::asset('dashboard/img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">{{ appName() }}</span>
      	</a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-heigh-vh-100 h-auto h-100" id="sidenav-collapse-main">
      	<ul class="navbar-nav">
            <li class="nav-item">
          	<a class="nav-link  active" href="/admin-dashboard">
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
                    	<li class="nav-item d-none">
                      	    <a class="nav-link " href="/deposit-funds">
                        	<span class="sidenav-mini-icon text-xs"> D </span>
                        	<span class="sidenav-normal"> Deposit Funds </span>
                	    </a>
                    	</li>
                    	<li class="nav-item">
                      	    <a class="nav-link " href="/account/admin/deposit/all">
                        	<span class="sidenav-mini-icon text-xs"> V </span>
                        	<span class="sidenav-normal"> View Deposits </span>
                      	    </a>
			</li>
			<li class="nav-item d-none">
                      	    <a class="nav-link " href="/upload-deposit">
                        	<span class="sidenav-mini-icon text-xs"> U </span>
                        	<span class="sidenav-normal"> Manage Deposit </span>
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
                    	<li class="nav-item d-none">
                      	    <a class="nav-link " href="/account/withdrawal/withdraw">
                        	<span class="sidenav-mini-icon text-xs"> W </span>
                        	<span class="sidenav-normal"> Withdraw Funds </span>
                	    </a>
                    	</li>
                    	<li class="nav-item">
                      	    <a class="nav-link " href="/all-withdrawals">
                        	<span class="sidenav-mini-icon text-xs"> V </span>
                        	<span class="sidenav-normal"> View Withdrawals </span>
                      	    </a>
			</li>
			<li class="nav-item d-none">
                      	    <a class="nav-link " href="/upload-withdrawal">
                        	<span class="sidenav-mini-icon text-xs"> U </span>
                        	<span class="sidenav-normal"> Upload Withdrawal </span>
                      	    </a>
                    	</li>


                    </ul>
                </div>
	    </li>
	    <li class="nav-item">
        	<a data-bs-toggle="collapse" class="nav-link" href="#referrals" aria-controls="referrals" role="button" aria-expanded="false">
	    	    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
			<x-svg.basket/>
	    	    </div>
            	    <span class="nav-link-text ms-1">Referrals</span>
	  	</a>
          	<div class="collapse" id="referrals">
		    <ul class="nav ms-4 ps-3 nav-sm flex-column">
                    	<li class="nav-item d-none">
                      	    <a class="nav-link" href="/manage-plans">
                        	<span class="sidenav-mini-icon text-xs"> M </span>
                        	<span class="sidenav-normal"> View Referrals </span>
                	    </a>
                    	</li>
                    	<li class="nav-item">
                      	    <a class="nav-link " href="/admin-referrals">
                        	<span class="sidenav-mini-icon text-xs"> V </span>
                        	<span class="sidenav-normal"> Referral Earnings </span>
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
                      	    <a class="nav-link" href="/manage-plans">
                        	<span class="sidenav-mini-icon text-xs"> M </span>
                        	<span class="sidenav-normal"> Manage Packages </span>
                	    </a>
                    	</li>
                    	<li class="nav-item">
                      	    <a class="nav-link " href="/plan-subscriptions">
                        	<span class="sidenav-mini-icon text-xs"> V </span>
                        	<span class="sidenav-normal"> View Subscriptions </span>
                      	    </a>
                    	</li>
                    </ul>
                </div>
	    </li>
            <li class="nav-item mt-3">
          	<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
	    <li class="nav-item">
          	<a class="nav-link " href="/account/admin/profile">
		    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
			<x-svg.customer-support/>
		    </div>
            	    <span class="nav-link-text ms-1">Profile</span>
          	</a>
	    </li>
	    <li class="nav-item">
          	<a class="nav-link " href="/admin-notifications">
		    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
			<x-svg.document/>
		    </div>
            	    <span class="nav-link-text ms-1">Notifications</span>
          	</a>
            </li>

            <li class="nav-item">
          	<a class="nav-link fixed-plugin-button" href="/settings">
            	    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
             		<x-svg.settings/> 
            	    </div>
            	    <span class="nav-link-text ms-1">Settings</span>
          	</a>
            </li>
            <li class="nav-item">
          	<a class="nav-link" href="/admin-sign-out">
            	    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              		<x-svg.spaceship />	
            	    </div>
            	    <span class="nav-link-text ms-1">Log out</span>
          	</a>
            </li>
      	</ul>
    </div>
</aside> 
