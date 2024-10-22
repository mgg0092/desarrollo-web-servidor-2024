<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <?php
    $edad = rand(-10,140);

    /* IF  */
    if($edad >= 0 && $edad <= 4) {
        echo "Es un bebe";
    } elseif($edad >= 5 && $edad <= 17) {
        echo "Es menor de edad";
    } elseif($edad >= 18 && $edad <= 65) {
        echo "Es un adulto";
    }elseif ($edad >= 66 && $edad <= 120) {
        echo "Es un jubilado";
    } else {
        echo "ERROR";
    }


    /* MATCH */
    $comparacion = match(true) {
        $edad >= 0 && $edad <= 4 => "<p>Es un bebe</p>",
        $edad >= 5 && $edad <= 17 => "<p>Es menor de edad</p>",
        $edad >= 18 && $edad <= 65 =>"<p>Es un adulto</p>",
        $edad >= 66 && $edad <= 120 =>"<p>Es un jubilado</p>",
        default => "<p>ERROR</p>"
    };

    echo $comparacion
    ?>
</body>
</html>