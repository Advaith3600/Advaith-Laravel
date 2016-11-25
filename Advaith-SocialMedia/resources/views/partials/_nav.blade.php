<ul class="w3-navbar w3-indigo ad-navbar w3-card-2">
	<li class="w3-col s2 w3-center">
		<a href="/home" class="{{ Request::is('home') ? 'active' : null }}"><i class="fa fa-credit-card" aria-hidden="true"></i></a>
	</li>
	<li class="w3-col s2 w3-center">
		<a href=""><i class="fa fa-users" aria-hidden="true"></i></a>
	</li>
	<li class="w3-col s2 w3-center">
		<a href=""><i class="fa fa-comments" aria-hidden="true"></i></a>
	</li>
	<li class="w3-col s2 w3-center">
		<a href=""><i class="fa fa-globe" aria-hidden="true"></i></a>
	</li>
	<li class="w3-col s2 w3-center">
		<a href=""><i class="fa fa-search" aria-hidden="true"></i></a>
	</li>
	<li class="w3-col s2 w3-center">
		<a href="/home/options" class="{{ Request::is('home/options') ? 'active' : null }}"><i class="fa fa-bars" aria-hidden="true"></i></a>
	</li>
</ul>