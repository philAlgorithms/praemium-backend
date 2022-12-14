{{-- <x-layout.dashboard :scripts=$scripts>
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <div class="container position-sticky z-index-sticky top-0">
		<div class="row">
		    <div class="col-12">
				<x-navigation.topbar.auth />
    	    </div>
		</div>	
    </div> --}}
<x-layouts.main :scripts=$scripts>
	<x-general.sticky-top>
		<x-navigations.topbar />
	</x-general.sticky-top>
    <main class="main-content main-content-bg mt-0">
		<div class="page-header min-vh-100" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-basic.jpg');">
	    	<span class="mask bg-gradient-dark opacity-6"></span>
	    	<div class="container">
				<div class="row justify-content-center mt-8">
					<x-cards.auth.register />
				</div>
	    	</div>
		</div>
    </main>
</x-layouts.main>
