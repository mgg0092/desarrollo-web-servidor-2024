<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        $barrios = [
            ['Centro', 2543],
            ['Huelin', 1109],
            ['Malaga Este', 890],
            ['Palma/Palmilla', 49]
        ]
    ?>

    <!-- Apartado 2.1 -->
     <form action="" method="post">
        <label for="nombreBarrio">Introduce el nombre del Barrio: </label>
        <input type="text" name="nombreBarrio">
        <input type="submit" value="Comprobar Barrio">
     </form>

     <?php
     if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombreBarrio"];
        
        if ($barrios[$pos][1] >= 1 && $barrios[$pos][1] < 50) {
            echo '<h3> Hay unas pocas viviendas turisticas</h3>';
        } else if ($barrios[$pos][1] >= 51 && $barrios[$pos][1] < 1000) {
            echo '<h3> Hay unas bastantes viviendas turisticas</h3>';
        }else if ($barrios[$pos][1] > 1000) {
            echo '<h3> Hay unas demasiadas viviendas turisticas</h3>';
        } else {
            echo '<h3> No hay viviendas turisticas</h3>';
        }
    }
    ?>
</body>
</html>