<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SYSCOUNTER</title>
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/style.css') !!}
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">SYSCOUNTER</a>
			</div>

			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Empresas</a></li>
					<li><a href="#about">Contadores</a></li>
					<li><a href="#contact">Precios</a></li>
					<li><a href="#contact">Soporte</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="../navbar/">Contacto</a></li>
					<li><a href="{{ route('auth/login') }}">INGRESAR</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<main>
		<img src="http://lorempixel.com/1920/937/nightlife/" class="img-responsive">
	</main>
	<footer>
		
	</footer>
</body>
</html>