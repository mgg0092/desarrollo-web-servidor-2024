<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercio 3</title>
</head>
<body>
    <form action="" method="post">
        <label for="numero">Introduce un numero:</label>
        <input type="text" name="numero"><br><br>

        <label for="Opcion">Opcion:</label>
        <select name="Eleccion">
            <option value="Par">Par</option>
            <option value="Primo">Primo</option>
        </select><br><br>

        <input type="submit" value="Comprobar">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_numero = $_POST['numero'];
            $_opcion = $_POST['Eleccion'];
        
            if ($_opcion == 'Par') {
                if($_numero % 2 == 0) echo '<h3>El numero introducido es par</h3>'; 
                else echo '<h3>El numero introducido no es par</h3>';
            } else {
                if ($_numero % $_numero == 0) echo '<h3>El numero introducido es primo</h3>';
                else echo '<h3>El numero introducido no es primo</h3>';
            }
        }
    ?>
</body>
</html>