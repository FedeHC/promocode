<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Probando</title>
</head>
<body>

<p> Base de datos </p>
<div class="card" style="width: 18rem;">
    <ul class="list-group list-group-flush">
        @foreach ($la_base_de_datos as $code)
            <li class="list-group-item">{{ $code }}</li>
        @endforeach
    </ul>

</div>
	

</body>
</html>
