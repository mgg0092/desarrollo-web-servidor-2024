<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <!--
     * Ejercicio 1: Añadir al array 4 estudiantes con sus asignaturas
     * 
     * Ejercicio 2: Eliminar 1 estudiante y su asignatura a libre 
     * elección
     * 
     * Ejercicio 3: Añadir una 3 columna que será la nota, obtenida 
     * aleatoriamente entre el 1 y 10.
     * 
     * Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO,
     * dependiendo de si la nota es igual o superior a 5 o no.
     * 
     * Ejercicio 5: Ordenar alfabéticamente por los alumnos y lueg
    
     * Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO,
     * dependiendo de si la nota es igual o superior a 5 o no.
     * 
     * Ejercicio 5: Ordenar alfabéticamente por los alumnos y luego por
     * nota.SI hay varias filas con el mismo nombre y la misma nota,ordenar 
     * por la asignatura alfabéticamente.
     * 
     * Ejercicio 6:Mostrarlo todo en una tabla.
    -->
    <?php

    $notas = [["Paco", "Desarrollo Web Servidor"],["Paco", "Desarrollo Web Cliente"],["Manu", "Desarrollo Web Servidor"],["Manu", "Desarrollo Web Cliente"]];
    array_push($notas, ["Carlos", "Ingles"]);
    array_push($notas, ["Jorge", "Empresas"]);
    array_push($notas, ["Guillermo", "Despliegues"]);
    array_push($notas, ["Isma", "Diseno"]);

    unset($notas[1]);

    for ($i=0; $i < count($notas); $i++) {
        $notas[$i][2] = rand(1, 10);
    }
    
    for ($i=0; $i < count($notas); $i++) {
        if($notas[$i][2] >= 5) $notas[$i][3] = "Apto";
        else $notas[$i][3] = "No Apto";
    }

    $_alumno = array_column($notas, 0);
    $_asignatura = array_column($notas, 1);
    $_nota = array_column($notas, 2);
    $_tipo = array_column($notas, 3);

    array_multisort($_alumno, SORT_ASC, $_nota, SORT_ASC, $_asignatura, SORT_ASC, $notas);

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
            foreach($notas as $nota) { 
                list($Alumno, $Asignatura, $Nota, $Tipo) = $nota; ?>
                <tr>
                    <td><?php echo $Alumno?></td>
                    <td><?php echo $Asignatura?></td>
                    <td><?php echo $Nota?></td>
                    <td><?php echo $Tipo?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>