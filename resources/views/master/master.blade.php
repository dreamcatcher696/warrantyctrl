<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WarrantyControl</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/css/layout.css">
    @yield("header")
    </head>
<body>
	<div class="container-fluid">	
		<nav class="navbar navbar-inverse">	
			<div class="container-fluid">
				<div class="navbar-header">	
				<a class="navbar-brand" href="{{ url('/') }}">WarrantyControl</a>
				</div>
				<ul class="nav navbar-nav">
				<li class="{{Request::path() =='/' ? 'active' : ''}}"><a href="{{ url('/') }}">Home</a></li>
				@if (Auth::guest())
					</ul>
				@else
					<li class="{{Request::path() =='upload' ? 'active' : ''}}"><a href="{{ url('/upload') }}">Nieuwe garantie</a></li>
					<li class="{{Request::path() =='show' ? 'active' : ''}}"><a href="{{url('/show')}}">Mijn Garanties</a></li>
					
					</ul>
				@endif

				<!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Inloggen</a></li>
                            <li><a href="{{ url('/register') }}">Registreren</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown2" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Uitloggen
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
			</div>
		</nav>
		<div>	
			@yield("content")
		</div>	
    </div>
    <footer class="footer" >
      <div class="container">
        <p class="text-muted">Created for project Webservices By Thomas Eckert</p>
      </div>
    </footer>
</body>
</html>