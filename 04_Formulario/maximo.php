<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maximo</title>
</head>
<body>
    <!-- Crea un array con 10 numeros aleatorios del 1 al 10
    Mostrar dichos numeor de la forma que mas os guste
    Crear un formulario donde se intente introducir el maximo valor y compruebe si has acertado -->
    <?php
        $numeros = [];
        for ($i=0; $i < 10; $i++) { 
            $numeros[$i] = rand(1, 10);
        }

        ?>
</body>
</html>