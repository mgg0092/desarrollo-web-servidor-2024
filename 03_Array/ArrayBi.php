<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Bidimensionales</title>
    <link rel="stylesheet" href="ArrayBi.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $videojuegos = [
            ["Fifa 24", "Deportes", 70],
            ["Dark Souls", "Soulslike", 50],
            ["Hollow Knight", "Plataformas", 30]
        ];

        foreach ($videojuegos as $videojuego) {
            list($titulo, $categoria, $precio) = $videojuego;
            echo "<p>$titulo es un $categoria y cuesta $precio</p>";
        }
        ?>
        <table>
            <thead>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Tipo</th>
            </thead>
            <tbody>
                <?php
                $nuevo_videojuego = ['Throne of Liberty', 'MMO', 0];
                array_push($videojuegos, $nuevo_videojuego);
                array_push($videojuegos, ['Genshin Impact', 'Accion', 0]);
                array_push($videojuegos, ['Minecraft', 'Sandbox', 0]);

                $_precio = array_column($videojuegos, 2);
                array_multisort($_precio, SORT_DESC, $videojuegos);

                for ($i=0; $i < count($videojuegos); $i++) { 
                    if($videojuegos[$i][2] > 0) $videojuegos[$i][3] = "Es de Pago";
                    else $videojuegos[$i][3] = "Es Gratis";
                }

                foreach($videojuegos as $videojuego) { 
                    list($titulo, $categoria, $precio, $Tipo) = $videojuego; ?>
                    <tr>
                        <td><?php echo $titulo?></td>
                        <td><?php echo $categoria?></td>
                        <td><?php echo $precio?></td>
                        <td><?php echo $Tipo?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <h3>ORDENAR INVERSO</h3>
        <table>
            <thead>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Precio</th>
            </thead>
            <tbody>
                <?php

                $_categoria = array_column($videojuegos, 1);
                array_multisort($_categoria, SORT_DESC, $videojuegos);

                foreach($videojuegos as $videojuego) { 
                    list($titulo, $categoria, $precio) = $videojuego; ?>
                    <tr>
                        <td><?php echo $titulo?></td>
                        <td><?php echo $categoria?></td>
                        <td><?php echo $precio?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</body>
</html>