<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    define("EDAD", 25);

    $var = "Hola Mundo";
    //echo $var
    var_dump($var);
    
    $var = true;
    var_dump($var);

    echo EDAD;

    echo "<br><h2 style='color: orange'>La variable es $var<h2>";
    
    $frase1 = "Hola";
    $frase2 = "Mundo";

    echo $frase1 . $frase2;
    echo "<p>$frase1 "." $frase2</p>";

    ?>
</body>
</html>