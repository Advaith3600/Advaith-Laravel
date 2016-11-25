<!DOCTYPE html>
<html>
	<head>
		@include('partials._head')
	</head>
	<body>
		@include('partials._nav')
		<ul class="w3-ul h3 w3-margin w3-padding">
			<a href="" style="text-decoration: none">
				<li class="w3-white w3-border" style="color: #555!important">
					<img src="{{ Auth::user()->pro_pic }}" alt="profile picture" width="30" height="30" style="margin: 0;"> {{ Auth::user()->name }}
				</li>
			</a>
			<li class="divider">
				<small>Help and settings</small>
			</li>
			<a href="/logout" style="text-decoration: none">
				<li class="w3-white w3-border" style="color: #555!important">
					<i class="fa fa-cog"></i> Logout?
				</li>
			</a>
		</ul>
		@include('partials._message')
	</body>
</html>