<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="a"><br><br>
        <input type="text" name="b"><br><br>
        <input type="text" name="c"><br><br>
        <input type="submit" value="Comprobar">
    </form>

    <h1>Comprobacion:</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
    }
    ?>
    <ul>
        <?php
        for ($i = $a; $i <= $b; $i++) {
            if ($i % $c == 0) {
                echo "<li>$i</li>";
            }
        }
        ?>
    </ul>

</body>
</html>