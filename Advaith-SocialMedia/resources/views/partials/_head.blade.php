<title>Advaith-Socal Media @yield('title')</title>
<link rel="icon" href="{{ asset('favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('css/w3.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
<script>
	$(window).scroll(function() {
	    $(".slideanim").each(function(){
	      	var pos = $(this).offset().top;

	      	var winTop = $(window).scrollTop();
	        	if (pos < winTop + 600) {
	          		$(this).addClass("slide");
	        	}
	    	});
	  	});
</script>