<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
	</head>
	<body>
		<form action='{{ Route('admin.register') }}' method='post'>
			@csrf
			<div class='group_input'>
				<label for='titulo'>Titulo</label>
				<input type='text' name='titulo'>
			</div>
			<div class='group_input'>
				<label for='autor'>Autor</label>
				<input type='text' name='autor'>
			</div>
			<div class='group_input'>
				<label for='slug'>Slug</label>
				<input type='text' name='slug'>
			</div>
			<div class='group_input'>
				<label for='articulo'>Articulo</label>
				<textarea name='articulo'></textarea>
			</div>
			<input type='submit' value='Enviar'>
		</form>
	</body>
</html>
