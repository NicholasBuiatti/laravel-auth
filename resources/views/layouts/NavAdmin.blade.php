<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fontawesome 6 cdn -->
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
		integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
		crossorigin='anonymous' referrerpolicy='no-referrer' />

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Usando Vite -->
	@vite(['resources/js/app.js'])
</head>

<body>
	<div id="app">

		<div class="container-fluid vh-100">
			<div class="row h-100">
				<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse border-end border-secondary"
					style="background-color: #f8f5e1;">
					<div class="position-sticky pt-3 h-100 d-flex flex-column justify-content-between">
						<div>
							<div class="logo_laravel text-center">
								<img src="{{ asset('NBPortfolioLogo.png') }}" class="img-fluid w-50" alt="">
							</div>
							<hr>
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link text-dark {{ Route::currentRouteName() == 'admin.dashboard' ? 'myBG' : '' }}"
										href="{{ route('admin.dashboard') }}">
										<i class="fa-solid fa-gauge-high fa-lg fa-fw"></i></i> Dashboard
									</a>
								</li>
								<li class="nav-item">
									<a
										class="nav-link text-dark {{ Route::currentRouteName() == 'admin.project.index' || Route::currentRouteName() == 'admin.project.show' || Route::currentRouteName() == 'admin.project.create' || Route::currentRouteName() == 'admin.project.edit' ? 'myBG' : '' }}"
										href="{{ route('admin.project.index') }}">
										<i class="fa-solid fa-list-check fa-lg fa-fw"></i></i> Progetti
									</a>
								</li>
								<li class="nav-item">
									<a
										class="nav-link text-dark {{ Route::currentRouteName() == 'admin.messages.index' || Route::currentRouteName() == 'admin.messages.show' ? 'myBG' : '' }}"
										href="{{ route('admin.messages.index') }}">
										<i class="fa-solid fa-envelope fa-lg fa-fw"></i> Messaggi
									</a>
								</li>
								<li class="nav-item">
									<a
										class="nav-link text-dark {{ Route::currentRouteName() == 'admin.language.index' || Route::currentRouteName() == 'admin.language.show' || Route::currentRouteName() == 'admin.language.create' || Route::currentRouteName() == 'admin.language.edit' ? 'myBG' : '' }}"
										href="{{ route('admin.language.index') }}">
										<i class="fa-solid fa-code fa-lg fa-fw"></i> Linguaggi
									</a>
								</li>
								<li class="nav-item">
									<a
										class="nav-link text-dark {{ Route::currentRouteName() == 'admin.type.index' || Route::currentRouteName() == 'admin.type.show' || Route::currentRouteName() == 'admin.type.create' || Route::currentRouteName() == 'admin.type.edit' ? 'myBG' : '' }}"
										href="{{ route('admin.type.index') }}">
										<i class="fa-solid fa-laptop-code fa-lg fa-fw"></i> Tipologia
									</a>
								</li>
							</ul>
						</div>
						<div class="mb-3">
							<hr>
							<div class="dropdown text-center">
								<a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
									data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									<i class="fa-solid fa-circle-user fs-2 me-3 align-middle"></i>{{ Auth::user()->email }}
								</a>
								<ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
									<li><a class="dropdown-item" href="{{ url('/') }}">{{ __('Home') }}</a></li>
									<li><a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profilo') }}</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
											{{ __('Disconnetti') }}
										</a></li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</ul>
							</div>
						</div>
					</div>
				</nav>

				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 overflow-auto py-4"
					style="height: 100vh; background-color: rgb(240, 240, 240)">
					@yield('content')
				</main>
			</div>
		</div>
	</div>
</body>

</html>

<style>
	.myBG {
		background-color: #E1C699;
		text-decoration: underline;
		border: 2px solid #C2A679;
	}
</style>
