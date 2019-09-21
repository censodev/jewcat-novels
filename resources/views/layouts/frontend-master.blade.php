<!DOCTYPE html>
<html>
<head>
	<title>JewCatNovels</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FONT AWESOME 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/master.css') }}">
    @stack('mystyle')
</head>
<body>
	<header>
		@include('frontend.header')
	</header>
	<section class="container">
		@yield('content')
	</section>
	{{-- <footer>
		@include('frontend.footer')
	</footer> --}}
	
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	{{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>

	{{-- Sweat Alert --}}
	<script src="{{ asset('js/sweetalert.min.js') }}"></script>

	<!-- Price mask -->
	<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.price-mask').mask('000.000.000.000.000', {reverse: true});
		});
	</script>

	{{-- Validate bootstrap --}}
	<script>
	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();
	</script>

	@stack('headerScript')
	@stack('myscript')
</body>
</html>