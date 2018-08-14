<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Probando</title>
</head>
<body>
    <h1>Ingrese el código para descubrir su premio</h1>
    	<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-body">
                            <div class="form-group row mb-0">
                                <div class="col-sm offset-md">
                                    <form method="post">
                                    {{ csrf_field() }}
                                    	<div class="form-group">
										    <input type="text" name="code" />
										</div>
										<button type="submit" class="btn btn-default">Submit</button>

										
                                    </form>
                                    <div class="col-12 text-center">
						                <a class="btn btn-outline-secondary justify-content-center" href="{{ url('/') }}">
						                    {{ __('Volver')}}</a>
						            </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
