<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Encuesta enviada</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <div class="alert alert-success text-center">

            <h1>¡Gracias!</h1>

            <p>
                Tu encuesta ha sido enviada correctamente.
            </p>

            <a href="{{ route('index') }}" class="btn btn-primary mt-3">
                ← Regresar a la encuesta
            </a>

        </div>

    </div>

</body>

</html>
