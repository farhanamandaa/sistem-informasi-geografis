<nav class="navbar navbar-light navbar-laravel">
	<a class="navbar-brand">SIG</a>
	<ul class="nav justify-content-end">
		<li class="nav-item">
			<a href="#" class="nav-link">Home</a>
		</li>
		<li class="nav-item">
			<a href="#" class="nav-link">About</a>
		</li>
		@guest
		<li class="nav-item">
			<a href="login" class="nav-link">Login</a>
		</li>
		@else
		<li class="nav-item">
			<a href="admin" class="nav-link">Admin Menu</a>
		</li>
		@endguest
	</ul>
</nav>