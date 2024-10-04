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
            array_multisort($_horas, SORT_DESC, $autobuses);

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
</body>
</html>