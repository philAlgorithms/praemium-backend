<!DOCTYPE html>
<html lang="en">
    <head>
  	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

  	<link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
  	{{-- <link rel="icon" type="image/png" href="{{ URL::asset('dashboard/img/favicon.png') }}"> --}}
	  <link rel="icon" type="image/png" sizes="192x192" href="/favicon/android-icon-192x192.png">
	  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
	  <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
	  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
	  <link rel="manifest" href="/favicon/manifest.json">
	  <link rel="shortcut icon" href="/favicon.ico">
  	<title>
    	    {{ strtoupper(appName()) }}
  	</title>
  	<!--     Fonts and icons     -->
  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  	<!-- Nucleo Icons -->
  	<link href="{{ URL::asset('dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
  	<link href="{{ URL::asset('dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
  	<!-- Font Awesome Icons -->
  	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="{{ URL::asset('dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
        <link href="{{ URL::asset('dashboard/vendors/image-puzzle-slider-captcha/src/disk/slidercaptcha.min.css') }}" rel="stylesheet" />
	<!-- CSS Files -->
	<link href="{{ URL::asset('dashboard/vendors/cryptofont-1.3.0/cryptofont.css') }}" rel="stylesheet">
	<link id="pagestyle" href="{{ URL::asset('dashboard/css/soft-ui-dashboard-pro.min.css') }}" rel="stylesheet" />

    </head>

    <body class="g-sidenav-show bg-gray-100">
	{{ $slot }}
	<!--   Core JS Files   -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  	<script src="{{ URL::asset('dashboard/js/core/popper.min.js') }}"></script>
	<script src="{{ URL::asset('dashboard/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ URL::asset('dashboardjs/plugins/smooth-scrollbar.min.js') }}"></script>

  	<!-- Plugin for the charts, full documentation here: https://www.chartjs.org/ -->
  	<script src="{{ URL::asset('dashboard/js/plugins/chartjs.min.js') }}"></script>
  	<script src="{{ URL::asset('dashboard/js/plugins/Chart.extension.js') }}"></script>


	<script>
    	    var win = navigator.platform.indexOf('Win') > -1;
    	    if (win && document.querySelector('#sidenav-scrollbar')) {
      		var options = {
        	    damping: '0.5'
      		}
      		Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    	    }
  	</script>
  	<!-- Github buttons -->
  	<script async defer src="https://buttons.github.io/buttons.js"></script>
  	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="{{ URL::asset('dashboard/js/soft-ui-dashboard.min.js') }}"></script>
	<script src="{{ URL::asset('dashboard/js/custom/general.js') }}"></script>
    @foreach ($scripts as $script)
	<script src="{{ URL::asset($script) }}"></script>
    @endforeach
	<script src="//code.tidio.co/0jeqdo9pyebcciroybposeshw2jmvw5m.js" async></script>
    </body>
</html>
