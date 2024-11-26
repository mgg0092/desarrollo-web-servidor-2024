<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
    $suma;
    for ($i=0; $i <= 20; $i++) { 
        if($i % 2 == 0) $suma += $i;
    }

    echo "<p>La suma de los numeros pares es: $suma</p>";
    ?>

    <?php
    $diaSpain;
    $mesSpain;
    $dia = date("l");
    $mes = date("F");
    $dia2 = date("j");
    $ano = date("Y");

    switch($dia) {
        case "Monday":
            $diaSpain = "Lunes";
            break;
        case "Tuesday":
            $diaSpain = "Martes";
            break;
        case "Wednesday":
            $diaSpain = "Miercoles";
            break;
        case "Thursday":
            $diaSpain = "Jueves";
            break;
        case "Friday":
            $diaSpain = "Viernes";
            break;
        case "Saturday":
            $diaSpain = "Sabado";
            break;
        case "Sunday":
            $diaSpain = "Domingo";
            break;
    }
    switch($mes) {
        case "January":
            $mesSpain = "Enero";
            break;
        case "February":
            $mesSpain = "Febrero";
            break;
        case "March":
            $mesSpain = "Marzo";
            break;
        case "April":
            $mesSpain = "Abril";
            break;
        case "May":
            $mesSpain = "Mayo";
            break;
        case "June":
            $mesSpain = "Junio";
            break;
        case "July":
            $mesSpain = "Julio";
            break;
        case "August":
            $mesSpain = "Agosto";
            break;
        case "September":
            $mesSpain = "Septiembre";
            break;
        case "October":
            $mesSpain = "Octubre";
            break;
        case "November":
            $mesSpain = "Noviembre";
            break;
        case "December":
            $mesSpain = "Diciembre";
            break;
    }
    echo "$diaSpain $dia2 de $mesSpain de $ano";
    ?>
</body>
</html>