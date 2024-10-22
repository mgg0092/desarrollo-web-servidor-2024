<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobuses</title>
    <link rel="stylesheet" href="ArrayBi.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $autobuses = [
            ['Malaga', 'Ronda', 90, 10],
            ['Churriana', 'Malaga', 20, 3],
            ['Malaga', 'Granada', 120, 15],
            ['Torremolinos', 'Malaga', 30, 3.5]
        ];
        
        array_push($autobuses, ['Malaga', 'Benalmadena', 40, 4.5]);
        array_push($autobuses, ['Malaga', 'Cordoba', 120, 10]);

        // Ejer4
        array_push($autobuses, ['Cordoba', 'Sevilla', 120, 15]);
        array_push($autobuses, ['Montilla', 'Cordoba', 30, 3]);
        array_push($autobuses, ['Malaga', 'Palo', 30, 1.5]);
        array_push($autobuses, ['Malaga', 'Barcelona', 500, 50]);
    ?>
    <table>
        <thead>
            <th>Salida</th>
            <th>Destino</th>
            <th>Horas</th>
            <th>Precio</th>
        </thead>
        <tbody>
            <?php
            $_horas = array_column($autobuses, 2);
            $_salidas = array_column($autobuses, 1);
            array_multisort($_salidas, SORT_DESC, $_horas, SORT_DESC, $autobuses);

            foreach($autobuses as $autobus) { 
                list($Salida, $Destino, $Horas, $Precio) = $autobus; ?>
                <tr>
                    <td><?php echo $Salida?></td>
                    <td><?php echo $Destino?></td>
                    <td><?php echo $Horas?></td>
                    <td><?php echo $Precio?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <h3>Ejer5</h3>
    <table>
        <thead>
            <th>Salida</th>
            <th>Destino</th>
            <th>Horas</th>
            <th>Precio</th>
        </thead>
        <tbody>
            <?php
            $_destino = array_column($autobuses, 1);
            $_salidas = array_column($autobuses, 0);
            array_multisort($_salidas, SORT_ASC, $_destino, SORT_ASC, $autobuses);

            foreach($autobuses as $autobus) { 
                list($Salida, $Destino, $Horas, $Precio) = $autobus; ?>
                <tr>
                    <td><?php echo $Salida?></td>
                    <td><?php echo $Destino?></td>
                    <td><?php echo $Horas?></td>
                    <td><?php echo $Precio?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <h3>Ejer6</h3>
    <table>
        <thead>
            <th>Salida</th>
            <th>Destino</th>
            <th>Horas</th>
            <th>Precio</th>
        </thead>
        <tbody>
            <?php
            $_horas = array_column($autobuses, 2);
            $_precio = array_column($autobuses, 3);
            array_multisort($_horas, SORT_ASC, $_precio, SORT_ASC, $autobuses);

            foreach($autobuses as $autobus) { 
                list($Salida, $Destino, $Horas, $Precio) = $autobus; ?>
                <tr>
                    <td><?php echo $Salida?></td>
                    <td><?php echo $Destino?></td>
                    <td><?php echo $Horas?></td>
                    <td><?php echo $Precio?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
        for ($i=0; $i < count($autobuses); $i++) { 
            if($autobuses[$i][2] <= 30) {
                $autobuses[$i][4] = "Corta Distancia";
            }
            elseif ($autobuses[$i][2] > 30 && $autobuses[$i][2] <= 120) {
                $autobuses[$i][4] = "Media Distancia";
            }
            elseif ($autobuses[$i][2] > 120){
                $autobuses[$i][4] = "Larga Distancia";

            }
        }
    ?>
    <h3>Ejer6</h3>
    <table>
        <thead>
            <th>Salida</th>
            <th>Destino</th>
            <th>Horas</th>
            <th>Precio</th>
            <th>Tipo</th>
        </thead>
        <tbody>
            <?php
            foreach($autobuses as $autobus) { 
                list($Salida, $Destino, $Horas, $Precio, $Tipo) = $autobus; ?>
                <tr>
                    <td><?php echo $Salida?></td>
                    <td><?php echo $Destino?></td>
                    <td><?php echo $Horas?></td>
                    <td><?php echo $Precio?></td>
                    <td><?php echo $Tipo?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>