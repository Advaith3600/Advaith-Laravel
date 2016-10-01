<!DOCTYPE html>
<html>
	<head>
		<title>Advaith-Website</title>
		<link rel="icon" href="{{asset('favicon.ico')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	</head>
	<body>
	<div id="left" class="left col-md-2">
		<div class="close ad-close">&times;</div>
		<ul class="list-group ad-list">
			@yield('list')
		</ul>
	</div>
	<div class="col-md-10 main" id="main">
		<button class="ad-side-btn">
			<img src="{{asset('images/1.png')}}" class="image">
		</button>
		<img src="{{asset('images/aj.ico')}}" height="100%">
		<span class="ad-h1">Website for Learning Web Development</span>
	</div>
	<div class="col-md-10" id="content">
		@yield('body')
	</div>
	<script type="text/javascript">
		$('.ad-side-btn').click(function() {
			$('#left').show('slow');
			$('#main').hide('slow');
			$('#content').hide('slow');
		})
		$('.ad-close').click(function() {
			$('#left').hide('slow');
			$('#main').show('slow');
			$('#content').show('slow');
		})
	</script>
	</body>
</html>