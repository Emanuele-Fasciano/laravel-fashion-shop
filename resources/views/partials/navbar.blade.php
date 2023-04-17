	<div id="app">

	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="navbar-custom">
	<div class="container">
	<a class="navbar-brand d-flex align-items-center" href="{{ route('guest') }}">
	<img src="https://t3.ftcdn.net/jpg/02/88/35/66/360_F_288356646_3bM9pwGObyRiXRD36JxDsFZdFbE0xW6r.jpg"
	alt="" class="logo">
	</a>

	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
	aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
	<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<!-- Left Side Of Navbar -->
	<ul class="navbar-nav me-auto">
	</ul>

	<!-- Right Side Of Navbar -->
	<ul class="navbar-nav ml-auto">
	<!-- Authentication Links -->
	@guest

			<li class="nav-item">
			<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			</li>
			@if (Route::has('register'))
			{{-- <li class="nav-item">
			<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
			</li> --}}
			@endif
	@else
			<li class="nav-item">
			<a class="nav-link" href="{{ route('admin.shoes.index') }}">{{ __('Lista') }}</a>
			</li>
			<li class="nav-item dropdown">
			<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
			data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
			{{ Auth::user()->name }}
			</a>

			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
			<a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
			<a class="dropdown-item" href="{{ route('logout') }}"
			onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
			{{ __('Logout') }}
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
			@csrf
			</form>
			</div>
			</li>
	@endguest
	</ul>
	</div>
	</div>
	</nav>
	</div>
