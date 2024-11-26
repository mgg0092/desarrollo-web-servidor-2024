<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="n1">Primer Valor</label>
        <input type="text" name="n1" placeholder="Introduce un número min">
        <label for="n2">Segundo Valor</label>
        <input type="text" name="n2" placeholder="Introduce un número max">
        <input type="submit" value="Primos">
    </form>
    <h1>Comprobacion:</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
        $n1 = $_POST["n1"];
        $n2 = $_POST["n2"];
        
        for ($i=$n1; $i<= $n2; $i++) {
            $comprobar = 0;
            for ($j=1; $j <= $i; $j++) { 
                if ($i % $j == 0){
                    $comprobar=$comprobar+1;
                }
            }
            if ($comprobar==2) {
                echo "<p>$i</p>";
            }
            
        }
    }
    ?>
</body>
</html>