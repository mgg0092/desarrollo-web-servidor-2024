<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        $Personajes = [
            ['Shenhe', 'Cryo'],
            ['Mavuika', 'Pyro'],
            ['Mualani', 'Hydro'],
            ['Nahida', 'Dendro']
        ];

        // Apartado 1.1
        array_push($Personajes, ['Furina', 'Hydro']);
        array_push($Personajes, ['Kequing', 'Electro']);

        // Apartado 1.2
        unset($Personajes[5]);

        // Apartado 1.3
        for ($i=0; $i < count($Personajes); $i++) { 
            $Personajes[$i][2] = rand(500, 2000);
        }

        // Apartado 1.4
        for ($i=0; $i < count($Personajes); $i++) { 
            $Personajes[$i][3] = rand(10000, 30000);
        }

        // Apartado 1.5
        for ($i=0; $i < count($Personajes); $i++) {
            if ($Personajes[$i][3] >= 20000) {
                $Personajes[$i][4] = 'Tanque';
            }elseif($Personajes[$i][2] >= 1500 && $Personajes[$i][3] != 'Tanque') {
                $Personajes[$i][4] = "Ataque";
            } else {
                $Personajes[$i][4] = "Soporte";
            }
        }

        // Apartado 1.6
        $_puntosATQ = array_column($Personajes, 2);
        $_puntosHP = array_column($Personajes, 3);
        $_nombre = array_column($Personajes, 0);
        array_multisort($_puntosATQ, SORT_ASC, $_puntosHP, SORT_ASC, $_nombre, $Personajes)
    ?>
    <!-- Apartado 1.7 -->
     <table>
        <thead>
            <th style="border: 1px solid black">Nombre</th>
            <th style="border: 1px solid black">Elemento</th>
            <th style="border: 1px solid black">ATQ</th>
            <th style="border: 1px solid black">HP</th>
            <th style="border: 1px solid black">ROL</th>
        </thead>
        <tbody>
            <?php
                foreach($Personajes as $personaje) { 
                    list($nombre, $elemento, $atq, $hp, $rol) = $personaje; ?>
                    <tr>
                        <td style="border: 1px solid black"><?php echo $nombre?></td>
                        <td style="border: 1px solid black"><?php echo $elemento?></td>
                        <td style="border: 1px solid black"><?php echo $atq?></td>
                        <td style="border: 1px solid black"><?php echo $hp?></td>
                        <td style="border: 1px solid black"><?php echo $rol?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
     </table>
</body>
</html>