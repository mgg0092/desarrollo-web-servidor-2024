<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="numero_1"><br><br>
        <input type="text" name="numero_2"><br><br>
        <input type="text" name="numero_3"><br><br>
        <input type="submit" value="Comprobar">
    </form>

    <h1>Comprobacion:</h1>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero1 = $_POST["numero1"];
            $numero2 = $_POST["numero2"];
            $numero3 = $_POST["numero3"];

            $resultado = match(true) {
                $numero1 > $numero2 && $numero1 > $numero3  => "$numero1 es el mayor",
                $numero2 > $numero1 && $numero2 > $numero3  => "$numero2 es el mayor",
                $numero3 > $numero1 && $numero3 > $numero2  => "$numero3 es el mayor",
            };

            echo "<h2>$resultado</h2>";
        }
    ?>
</body>
</html>