<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fechas</title>
</head>
<body>
    <?php
        echo date("j");

    // $numero % 4
    $dia = date("j");

    if($dia % 2 == 0) echo "<br>El numero del dia es par";
    else echo "<br>El numero del dia es impar";
    ?>
</body>
</html>