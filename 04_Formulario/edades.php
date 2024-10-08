<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <title>Edades</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="Nombre">
        <input type="text" name="Edad">
        <input type="submit" value="Enviar">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $Nombre = $_POST["Nombre"];
            $Edad = (int)$_POST["Edad"];
            $comparacion = match(true) {
                $Edad < 18 => "<p>$Nombre es menor de edad</p>",
                $Edad >= 18 && $Edad < 65 => "<p>$Nombre es un adulto</p>",
                $Edad >= 65 =>"<p>$Nombre es un jubilado</p>",
                default => "<p>ERROR</p>"
            };

            echo $comparacion;
        }
        
    ?>
</body>
</html>