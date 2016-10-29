<!DOCTYPE html>
<html>
<head>
	@include('partials._head')
</head>
<body>
	@include('partials._nav')
	<div class="container">
		@include('partials._intro')
		@include('partials._message')
		@yield('content')
	</div>
	@include('partials._js')
</body>
</html>