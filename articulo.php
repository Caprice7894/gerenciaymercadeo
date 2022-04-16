<?php
$entrada = $_GET['entrada'];

http_response_code(200);
echo json_encode(array(
	'titulo' => $entrada,
	'articulo' => '<p>Este es un articulo de prueba</p><p>Mucho gusto ?)</p>',
));
?>
