<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <?php
        $Productos = [
            ["Nintendo Switch", 300],
            ["PlayStation Slim", 500],
            ["PlayStation Pro", 800],
            ["XBOX Series S", 300],
            ["XBOX Series X", 400]
        ];

        for ($i=0; $i < count($Productos); $i++) { 
            $Productos[$i][2] = rand(0, 5);
        }
    ?>
    <table>
        <thead>
            <th>Consola</th>
            <th>Precio</th>
            <th>Stock</th>
        </thead>
        <tbody>
            <?php
                foreach($Productos as $Producto) { 
                    list($Consola, $Precio, $Stock) = $Producto; ?>
                    <tr>
                        <td><?php echo $Consola?></td>
                        <td><?php echo $Precio?></td>
                        <td><?php echo $Stock?></td>
                    </tr>
                <?php
                }
                ?>
        </tbody>
    </table>
    <form action="" method="GET">
        <label for="Producto">Introduzca el nombre del producto</label>
        <input type="text" name="Consola" id="Consola" placeholder="Introduce el producto">
        <input type="submit" value="Mostrar Producto">
    </form>
</body>
</html>