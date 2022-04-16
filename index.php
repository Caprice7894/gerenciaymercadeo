<?php
$hostname = $_SERVER['HTTP_HOST'];
?>
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

		<link rel="stylesheet" type="text/css" href="http://<?=$hostname?>/css/style.css">
		<script src="http://<?=$hostname?>/js/vue@3"></script>
<script src="http://<?=$hostname?>/js/vue_app.js" type="module"></script>
	</head>

	<body id='app'>
		<div class='header'>
			<input name='check' id='check' type='checkbox' class='check'>
			<label for='check' class='nav-button'>
				<div></div>
				<div></div>
				<div></div>
			</label>
			<header>
				Gerencia y mercadeo
			</header>
			<nav>
				<ul>
					<li @click='mostrarArticulo("introduccion")'>Introduccion</li>
					<li @click='mostrarArticulo("modulo1")'>Modulo I</li>
					<li @click='mostrarArticulo("modulo2")'>Modulo II</li>
					<li @click='mostrarArticulo("modulo3")'>Modulo III</li>
					<li @click='mostrarArticulo("modulo3")'>Modulo IV</li>
					<li @click='mostrarArticulo("modulo3")'>Modulo V</li>
				</ul>
			</nav>
		</div>
	
	<main>
			<article>
				<h1 class='titulo'>{{ titulo }}</h1>
				<section v-html='articulo'>

				</section>
				<div class='author-date'>
					<div class='fecha'>
						{{ fecha }}
					</div>
					<div class='author'>
						{{ autor }}
					</div>
				</div>
			</article>
		</main>
	</body><!--Fin de app-->
</html>
<?php

?>
