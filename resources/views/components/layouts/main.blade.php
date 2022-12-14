<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>{{ appName() }}</title>

  <!-- Favicon -->
  <link href="{{ URL::asset('img/brand/favicon.png') }}" rel="icon" type="image/png">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Icons -->
  <link href="{{ URL::asset('css/nucleo-icons.css') }}" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href="{{ URL::asset('dashboard/css/spop.css') }}" rel="stylesheet">

<link href="{{ URL::asset('dashboard/vendors/image-puzzle-slider-captcha/src/disk/slidercaptcha.min.css') }}" rel="stylesheet" />
  <!-- Soft UI Design System -->
  <link href="{{ URL::asset('dashboard/vendors/cryptofont-1.3.0/cryptofont.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ URL::asset('css/soft-design-system-pro.min.css') }}" rel="stylesheet">

</head>
<body>
<input type="hidden" id="telegram-username" value="{{ variable('TELEGRAM_USERNAME')}}" >
  	{{ $slot }}

  <!--   Core JS Files   -->
  <script src="{{ URL::asset('js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('js/plugins/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('js/plugins/moment.min.js') }}"></script>
  <script src="{{ URL::asset('dashboard/js/custom/spop.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('dashboard/js/custom/pagato.js') }}" type="text/javascript"></script>


  <!-- Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ URL::asset('js/plugins/nouislider.min.js') }}"></script>

  <!--  Plugin for the Carousel, full documentation here: http://jedrzejchalubek.com/  -->
  <script src="{{ URL::asset('js/plugins/glidejs.min.js') }}"></script>

  <!--	Plugin for Select, full documentation here: https://joshuajohnson.co.uk/Choices/ -->
  <script src="{{ URL::asset('js/plugins/choices.min.js') }}" type="text/javascript"></script>


  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <!-- Control Center for Soft UI Design System: parallax effects, scripts for the example pages etc -->
  <script src="{{ URL::asset('js/soft-design-system-pro.min.js') }}" type="text/javascript"></script>
    	<script src="{{ URL::asset('dashboard/js/custom/general.js') }}" type="text/javascript"></script>
    @foreach ($scripts as $script)
	<script src="{{ URL::asset($script) }}" type="text/javascript"></script>
    @endforeach
    <script src="{{ URL::asset('dashboard/js/custom/vendors.js') }}"></script>
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/63968cabb0d6371309d3e8ca/1gk21b0jq';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
<!-- GetButton.io widget -->
{{-- <script type="text/javascript">
    (function () {
        var options = {
            telegram: document.getElementById('telegram-username').value, // Telegram bot username
            call_to_action: "Message us", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script> --}}
<!-- /GetButton.io widget -->
    </body>
</html>
