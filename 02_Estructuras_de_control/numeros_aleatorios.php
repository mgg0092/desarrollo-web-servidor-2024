<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros Aleatorios</title>
</head>
<body>
    <?php
    $n = rand(1,3);

    switch($n) {
        case 1:
            echo "<p>El numero aleatorio es $n</p>";
            break;
        case 2:
            echo "<p>El numero aleatorio es $n</p>";
            break;
        default:
            echo "<p>El numero aleatorio es $n</p>";
    }


    /* COMPROBAR CON UN SWITCH SI UN NUMERO ES PAR O IMPAR */

    $z = rand(1,10);

    $comprobacion = $z % 2;
    
    switch($comprobacion) {
        case 0:
            echo "<p>El numero aleatorio es par</p>";
            break;
        case 1:
            echo "<p>El numero aleatorio es impar</p>";
            break;
    }
    ?>
</body>
</html>