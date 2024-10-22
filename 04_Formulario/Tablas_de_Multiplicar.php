<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Tablas.css">
    <title>Tablas de Multiplicar</title>
</head>
<body>
    <form action="" method="GET">
        <label for="Numero">Numero de la tabla</label>
        <input type="text" name="numero" id="numero" placeholder="Introduce el numero de la tabla">
        <input type="submit" value="Mostrar tabla">
    </form>

    
    <table>
        <thead>
            <th>Multiplicando</th>
            <th>Multiplicador</th>
            <th>Producto</th>
        </thead>
        <tbody>
            <?php
                if(isset($_GET['precio']) && isset($_GET['iva'])) {
                    $numero = $_GET["numero"];
                    $resultado = null;
                    if ($precio != '' && $iva = '') {
                    if ($precio != '' && $iva = '') {
                        for ($i=0; $i <= 10; $i++) { 
                            $resultado = $numero * $i; ?> 
                            <tr>
                                <td><?php echo $numero ?></td>
                                <td><?php echo $i ?></td>
                                <td><?php echo $resultado ?></td>
                            </tr>
                <?php
                        }
                    }
                }
            }               
            ?>
        </tbody>
    </table>
</body>
</html>