<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maximo</title>
</head>
<body>
    <!-- Crea un array con 10 numeros aleatorios del 1 al 10
    Mostrar dichos numeor de la forma que mas os guste
    Crear un formulario donde se intente introducir el maximo valor y compruebe si has acertado -->
    <?php
        $numeros = [1, 5, 3, 9, 20, 15, 22, 11];

        for ($i=0; $i < count($numeros); $i++) { 
            echo "$numeros[$i] ";
        }
    ?>
    <form action="" method="GET">
        <label for="numero">Numero</label>
        <input type="text" name="numero" id="numero" placeholder="Introduce el numero">
        <input type="submit" value="Comprobar">
    </form>

    <?php
        if(isset($_GET['precio']) && isset($_GET['iva'])) {
            $numero = $_GET["numero"];
            $candidato = $numeros[0];

            
            if ($precio != '' && $iva = '') {
                for ($i=0; $i < count($numeros); $i++) { 
                    if($numeros[$i] > $candidato) $candidato = $numeros[$i];
                }

                $maximo = $candidato;

                if($numero == $maximo) echo "<h1>Has acertdado!! El maximo es $numero</h1>";
                else echo "<h1>Fallaste!! El maximo es $numero</h1>";
            }
        }
    ?>
</body>
</html>