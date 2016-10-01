<!DOCTYPE html>
<html>
	<head>
		<title>Advaith-Website</title>
		<link rel="icon" href="{{asset('favicon.ico')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/w3.css')}}">
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	</head>
	<body>
		<div class="col-md-12 text-center" id="main">
			<img src="{{asset('images/aj.ico')}}" height="100%">
			<span class="ad-h1">Website for Learning Web Development</span>
		</div>
		<div class="col-md-12">
			<div class="w3-card-2 w3-white ad-bd ad-pd text-center ad-mg-tp">
				<h2 class="w3-xxlarge"><b>HTML</b></h2>
				<p class="w3-text-dark-grey w3-large">The language for building web pages</p>
				<a href="{{url('/html')}}" class="w3-btn w3-dark-grey">Learn HTML</a>
			</div>
			<div class="w3-card-2 w3-white text-center ad-bd ad-mg-tp ad-pd">
				<h2 class="w3-xxlarge"><b>CSS</b></h2>
				<p class="w3-text-dark-grey w3-large">The language for styling web pages</p>
				<a href="{{url('/css_')}}" class="w3-btn w3-dark-grey">Learn CSS</a>
			</div>
			<div class="w3-card-2 w3-white text-center ad-bd ad-mg-tp ad-pd">
				<h2 class="w3-xxlarge"><b>JavaScript</b></h2>
				<p class="w3-text-dark-grey w3-large">The language for programming web pages</p>
				<a href="{{url('/javascript')}}" class="w3-btn w3-dark-grey">Learn JavaScript</a>
			</div>
		</div>
	</body>
</html>