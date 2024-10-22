<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link rel="stylesheet" href="style.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $frutas = array(
        "clave 1" => "Manzana",
        'clave 2' => 'Naranja',
        'clave 3' => "Cereza"
    );

    //echo $frutas["clave 4"];
    //echo "<br>";

    $frutas = [
        "Manzana",
        "Naranja",
        "Cereza",
    ];

    $frutas2 = [
        0 => "Manzana",
        1 => "Naranja",
        2 => "Cereza"
    ];

    $frutas3 = [
        1 => "Manzana",
        0 => "Naranja",
        2 => "Cereza"
    ];

    if($frutas == $frutas2) {
        echo "<h3>Los arrays son iguales</h3>";
    }else {
        echo "<h3>Los arrays no son iguales</h3>";
    }

    if($frutas == $frutas3) {
        echo "<h3>Los arrays son iguales</h3>";
    }else {
        echo "<h3>Los arrays no son iguales</h3>";
    }

    echo "<h3>Mis frutas con FOR</h3>";
    echo "<ol>";
    for($i = 0; $i < count($frutas); $i++) {    //  3N
        echo "<li>" . $frutas[$i] . "</li>";
    }
    echo "</ol>";

    echo "<h3>Mis frutas con WHILE</h3>";
    echo "<ol>";
    $i = 0;
    while($i < count($frutas)) {
        echo "<li>" . $frutas[$i] . "</li>";    //  3N
        $i++;
    }
    echo "</ol>";

    echo "<h3>Mis frutas con FOREACH</h3>";
    echo "<ol>";
    foreach($frutas as $fruta) {
        echo "<li>$fruta</li>";
    }
    echo "</ol>";

    array_push($frutas, "Mango", "Melocotón");
    $frutas[] = "Sandía";
    $frutas[7] = "Uva";
    $frutas[] = "Melón";

    //echo $frutas[1];
    $frutas = array_values($frutas);

    unset($frutas[1]);

    //print_r($frutas);

    /*
        CREAR UN ARRAY CON UNA LISTA DE PERSONAS DONDE LA CLAVE SEA
        EL DNI Y EL VALOR EL NOMBRE

        QUE HAYA MINIMO 3 PERSONAS

        MOSTRAR EL ARRAY COMPLETO CON PRINT_R Y A ALGUNA PERSONA INDIVIDUAL

        AÑADIR ELEMENTOS CON Y SIN CLAVE

        BORRAR ALGUN ELEMENTO

        PROBAR A RESETAR LAS CLAVES
    */

    $personas = [
        "11223344F" => "José Alonso",
        "22331133G" => "Enya García",
        "44332211R" => "Fulgencio Hermenegildo"
    ];

    $personas["99112233G"] = "Cristiano 'El bicho' Ronaldo";
    $personas["00112211A"] = "Paquito de la Torre";
    $personas["22110044B"] = "Paco Fiestas";
    asort($personas);
    array_push($personas, "Messi 'La pulga'");

    unset($personas[0]);

    print_r($personas);

    //echo "<p>" . $personas["22331133G"] . "</p>";

    $tamano = count($personas);
    echo "<h3>$tamano</h3>";

    foreach($personas as $dni => $persona) {
        echo "<li>$persona" . " con DNI: " . $dni . "</li>";
    }
    echo "</ol>";
    ?>
    <br>
    <?php
    echo "<table>";
    echo "<thead><th>DNI</th><th>Persona</th><thead>";
    echo "<tbody>";
    foreach($personas as $dni => $persona) {
        echo "<tr><td>$dni</td> <td>$persona</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>

    <?php 
        /*
        Desarrollo web servidor => Alejandra
        Desarrollo web cliente => Jaime
        Diseno de interfaces => Jose
        Despliegue de aplicaciones => Alejandro
        Empresas => Gloria
        Ingles => Virginia
        */

        $Profesores = [
            "Desarrollo web servidor" => "Alejandra",
            "Desarrollo web cliente" => "Jaime",
            "Diseno de interfaces" => "Jose",
            "Despliegue de aplicaciones" => "Alejandro",
            "Empresas" => "Gloria",
            "Ingles" => "Virginia"
        ];

        $Calificaciones = [
            "Guillermo" => 3,
            "Daiana" => 5,
            "Angel" => 8,
            "Ayoub" => 7,
            "Mateo" => 9,
            "Joaquin" => 4
        ]
    ?>
    <h3>Ordenada Alfabeticamente</h3>
    <table>
        <thead>
            <th>Asignaturas</th>
            <th>Profesores</th>
        </thead>
        <tbody>
            <?php
            ksort($Profesores);
            foreach($Profesores as $asignatura => $Profesor) { ?>
            <tr>
                <td><?php echo $asignatura ?></td>
                <td><?php echo $Profesor ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <h3>Ordenada Alfabeticamente Inversa</h3>
    <table>
        <thead>
            <th>Asignaturas</th>
            <th>Profesores</th>
        </thead>
        <tbody>
            <?php
            arsort($Profesores);
            foreach($Profesores as $asignatura => $Profesor) { ?>
            <tr>
                <td><?php echo $asignatura?></td>
                <td><?php echo $Profesor?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <h3>Notas</h3>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Calificacion</th>
            <th>Estado</th>
        </thead>
        <tbody>
            <?php
            foreach($Calificaciones as $Alumno => $Calificacion) { ?>
            <tr>
                <td><?php echo $Alumno?></td>
                <td><?php echo $Calificacion?></td>
                <?php 
                    if($Calificacion >= 5) {
                        echo "<td class='Aprobado'> Aprobado </td>"; 
                    } else 
                    { 
                        echo "<td class='Suspenso'> Suspenso </td>"; 
                    }
                ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>