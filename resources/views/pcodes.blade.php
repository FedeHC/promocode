<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Probando</title>
</head>
<body>
    <h1>1,2,3 probando PCODES:</h1>
    <p>Acá va lo de DB.</p>

	<ul>
		@foreach ($la_base_de_datos as $code)
			<li>{{ $code }}</li>
		@endforeach
	</ul>

</body>
</html>
