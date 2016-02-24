<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SYSCOUNTER</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
</head>
<body>
	<nav class="blue darken-2">
		<div class="nav-wrapper">
			<a href="#!" class="brand-logo">SYSCOUNTER</a>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
                            <li class="active"><a href="#">Empresas</a></li>
                            <li><a href="#about">Contadores</a></li>
                            <li><a href="#contact">Precios</a></li>
                            <li><a href="#contact">Soporte</a></li>
                            <li><a href="{{ route('auth/login') }}">Iniciar sesión</a></li>
                            <li><a href="{{ route('auth/register') }}">Registrarse</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
                            <li class="active"><a href="#">Empresas</a></li>
                            <li><a href="#about">Contadores</a></li>
                            <li><a href="#contact">Precios</a></li>
                            <li><a href="#contact">Soporte</a></li>
                            <li><a href="{{ route('auth/login') }}">Iniciar sesión</a></li>
                            <li><a href="{{ route('auth/register') }}">Registrarse</a></li>
			</ul>
		</div>
	</nav>

	<div class="parallax-container">
		<div class="parallax"><img src="http://lorempixel.com/1920/937/nightlife/1"></div>
	</div>

	<div class="section white">
		<div class="row container">
			<h2 class="header">Parallax</h2>
			<p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
		</div>
	</div>

	<footer class="page-footer grey darken-3">
      <div class="container">
        <div class="row">
          <div class="col s10">
            <h5 class="white-text">Contacto</h5>
            <p class="grey-text text-lighten-4">
            	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin elementum, dolor a luctus interdum, augue nisi mollis felis, vel aliquam tellus dui eget ligula. Ut nec purus placerat, molestie orci sed, pretium metus. Etiam vehicula justo sit amet eleifend ultricies. Vivamus vitae neque sit amet diam condimentum venenatis a at magna. Nunc maximus augue diam, ac iaculis est aliquam pretium. Donec eu nisi et felis fermentum mattis.
            </p>
          </div>
          <div class="col s2">
            <h5 class="white-text">Nosotros</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="#!">Empresas</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Contadores</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Precios</a></li>
              <li><a class="grey-text text-lighten-3" href="#!">Soporte</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © {{date('Y')}} Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$(".button-collapse").sideNav();
			$(".dropdown-button").dropdown();
			$(".parallax").parallax();
		});
	</script>
</body>
</html>