<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <title>Ejemplo</title>
</head>
<body>
    <?php
    /*
        SINGLE PAGE FORM -> TODA LA INFORMACION SE PROCESA EN LA MISMA PAGINA

        MULTI PAGE FORM -> REENVIA A OTRA PAGINA
    */
    ?>
    <form action="" method="post">
        <input type="text" name="mensaje">
        <input type="text" name="veces">
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // El servidor ejecutara este bloque de codigo cuando reciba una peticion POST
            $mensaje = $_POST["mensaje"];
            $veces = (int)$_POST["veces"];

            for ($i=0; $i <= $veces; $i++) { 
                echo "<h1>$mensaje</h1>";
            }
        }
    ?>
    <h1>Ejercicio 2</h1>
    <form action="" method="post">
        <input type="text" name="base">
        <input type="text" name="exponente">
        <input type="submit" value="Calcular">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // El servidor ejecutara este bloque de codigo cuando reciba una peticion POST
            $base = (int)$_POST["base"];
            $exponente = (int)$_POST["exponente"];
            
            echo "<p>El resultado del exponente es: " . pow($base, $exponente) . "</p>";
        }
    ?>
</body>
</html>