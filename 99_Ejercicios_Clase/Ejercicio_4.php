<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="temp">Temperatura:</label>
        <input type="text" name="temperatura"><br><br>

        <label for="from_unit">Unidad de Principal:</label>
        <select name="unidadInicio">
            <option value="Celsius">Celsius</option>
            <option value="Fahrenheit">Fahrenheit</option>
            <option value="Kelvin">Kelvin</option>
        </select><br><br>
        
        <label for="to_unit">Convertir a:</label>
        <select name="UnidadFin">
            <option value="Celsius">Celsius</option>
            <option value="Fahrenheit">Fahrenheit</option>
            <option value="Kelvin">Kelvin</option>
        </select><br><br>

        <input type="submit" value="Convertir">
    </form>

    <h1>Convertir:</h1>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $temperatura = $_POST['temperatura'];
            $unidadInicio = $_POST['unidadInicio'];
            $UnidadFin = $_POST['UnidadFin'];
        
            if ($unidadInicio == $UnidadFin) {
                $resultado = $temperatura; 
            }
        
            if ($unidadInicio == "Fahrenheit") {
                $resultado = ($temperatura - 32) * 5 / 9;
            } elseif ($unidadInicio == "Kelvin") {
                $resultado = $temperatura - 273.15;
            }
        
            if ($UnidadFin == "Fahrenheit") {
                $resultado = ($temperatura + 32) * 9 / 5;
            } elseif ($UnidadFin == "Kelvin") {
                $resultado = $temperatura + 273.15;
            }

        echo "<h3>$temperatura $unidadInicio es equivalente a $resultado $UnidadFin</h3>";
        }
    ?>
</body>
</html>
