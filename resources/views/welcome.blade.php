<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="with=device-width. height=device-height. initial-scale=1.0. minimum-scale=1.0">

		<title>Gerencia y mercadeo</title>

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

		<link rel="stylesheet" type="text/css" href="http://gerenciaymercadeo.com/css/style.css">
		<script src="http://gerenciaymercadeo.com/js/vue@3"></script>
<script src="http://gerenciaymercadeo.com/js/vue_app.js" type="module"></script>
	</head>

	<body id='app'>
		<div class='header'>
			<input name='check' id='check' type='checkbox' class='check'>
			<label for='check' class='nav-button'>
				<div></div><div></div><div></div>
			</label>
			<header>
				Gerencia y mercadeo
			</header>
			<nav>
				<ul>
					@foreach ($articulos as $articulo)
						<li @click='mostrarArticulo("{{ $articulo->slug }}")'>{{ $articulo->titulo }}</li>
					@endforeach
				</ul>
			</nav>
		</div>
	
	<main>
			<article>
				<h1 class='titulo' v-html='titulo'></h1>
				<section v-html='articulo'></section>
				<div class='author-date'>
					<div class='fecha' v-html='fecha'>
					</div>
					<div class='author' v-html='autor'>
					</div>
				</div>
			</article>
		</main>
	</body><!--Fin de app-->
</html>
