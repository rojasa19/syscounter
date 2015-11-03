<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Locaciona</title>
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
     	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="import" href="{{ asset('assets/bower_components/google-youtube/google-youtube.html') }}">
    <link rel="import" href="{{ asset('assets/bower_components/google-map/google-map.html') }}">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			    <span class="sr-only">Toggle Navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">SYSCOUNTER</a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
				    @if (Auth::guest())
				        <li><a href="{{route('auth/login')}}">Iniciar sesión</a></li>
						<li><a href="{{route('auth/register')}}">Registrarte</a></li>
				    @else
		                <li>
		                    <a href="{{route('imbox')}}">{{ Auth::user()->name }}</a>
		                </li>
		                <li><a href="{{route('auth/logout')}}">Salir</a></li>

			        @endif
				</ul>
			</div>
		</div>
	</nav>

	<div class="subnav hide-print">
		<div class="container">
			<ul class="subnav-list">
				<li>
					<a href="{{ route('imbox') }}" aria-selected="false" class="subnav-item">Bandeja de entrada</a>
				</li>
				<li>
					<a href="{{ route('locaciones') }}" aria-selected="false" class="subnav-item">Tus Locaciones</a>
				</li>
				<li>
					<a href="#" aria-selected="false" class="subnav-item">Reservas a tu locación</a>
				</li>
				<li>
					<a href="#" aria-selected="false" class="subnav-item">Tus reservas</a>
				</li>
				<li>
					<a href="{{ route('perfil') }}" aria-selected="false" class="subnav-item">Perfil</a>
				</li>
			</ul>
		</div>
	</div>

    <div class="container">
               @if (Session::has('errors'))
		    <div class="alert alert-warning" role="alert">
			<ul>
	            <strong>Oops! Algo salio mal: </strong>
			    @foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
    </div>
    @yield('admin')
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/bower_components/webcomponentsjs/webcomponents-lite.min.js') !!}
</body>
</html>
